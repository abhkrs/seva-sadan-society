<?php
// Add menu item to WordPress admin
add_action('admin_menu', 'payment_admin_menu');

function payment_admin_menu()
{
    add_menu_page(
        'Payment Records', // Page title
        'Payment Records', // Menu title
        'manage_options', // Capability required
        'payment-records', // Menu slug
        'display_payment_records', // Function to display the page
        'dashicons-money-alt', // Icon
        30 // Position
    );
}

function display_payment_records()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'custom_payments';

    // Pagination settings
    $items_per_page = 10;
    $current_page = isset($_GET['paged']) ? max(1, intval($_GET['paged'])) : 1;
    $offset = ($current_page - 1) * $items_per_page;

    // Search functionality
    $search = isset($_GET['payment_search']) ? sanitize_text_field($_GET['payment_search']) : '';
    $where_clause = '';
    if (!empty($search)) {
        $where_clause = $wpdb->prepare(
            "WHERE customer_name LIKE %s 
            OR customer_email LIKE %s 
            OR customer_phone LIKE %s 
            OR customer_company LIKE %s 
            OR order_id LIKE %s 
            OR transaction_id LIKE %s 
            OR CAST(amount AS CHAR) LIKE %s",
            '%' . $wpdb->esc_like($search) . '%',
            '%' . $wpdb->esc_like($search) . '%',
            '%' . $wpdb->esc_like($search) . '%',
            '%' . $wpdb->esc_like($search) . '%',
            '%' . $wpdb->esc_like($search) . '%',
            '%' . $wpdb->esc_like($search) . '%',
            '%' . $wpdb->esc_like($search) . '%'
        );
    }
    // Get available years and months from the database
    $available_years = $wpdb->get_col("SELECT DISTINCT YEAR(payment_date) as year FROM $table_name ORDER BY year DESC");
    $available_months = $wpdb->get_col("SELECT DISTINCT DATE_FORMAT(payment_date, '%Y-%m') as month FROM $table_name ORDER BY month DESC");

    // Filter by date if selected
    $selected_year = isset($_GET['filter_year']) ? intval($_GET['filter_year']) : '';
    $selected_month = isset($_GET['filter_month']) ? sanitize_text_field($_GET['filter_month']) : '';

    if ($selected_year) {
        $where_clause .= $where_clause ? " AND " : " WHERE ";
        $where_clause .= $wpdb->prepare("YEAR(payment_date) = %d", $selected_year);
    }
    if ($selected_month) {
        $where_clause .= $where_clause ? " AND " : " WHERE ";
        $where_clause .= $wpdb->prepare("DATE_FORMAT(payment_date, '%Y-%m') = %s", $selected_month);
    }

    // Get total records for pagination
    $total_items = $wpdb->get_var("SELECT COUNT(*) FROM $table_name $where_clause");
    $total_pages = ceil($total_items / $items_per_page);

    // Get paginated records
    $payments = $wpdb->get_results(
        "SELECT * FROM $table_name 
        $where_clause 
        ORDER BY payment_date DESC 
        LIMIT $offset, $items_per_page"
    );
?>
    <div class="wrap">
        <h1>Payment Records</h1>

        <!-- Search and Filter Form -->
        <div class=" top">
            <form method="get">
                <input type="hidden" name="page" value="payment-records">
                <div class="filter-container">
                    <!-- Search Section -->
                    <div class="search-section">
                        <input type="search" name="payment_search" value="<?php echo esc_attr($search); ?>" placeholder="Search Donors...">
                        <button type="submit" class="button">Search</button>
                    </div>

                    <!-- Filter Section -->
                    <div class="filter-section">
                        <select name="filter_year">
                            <option value="">All Years</option>
                            <?php foreach ($available_years as $year): ?>
                                <option value="<?php echo esc_attr($year); ?>" <?php selected($selected_year, $year); ?>>
                                    <?php echo esc_html($year); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <select name="filter_month">
                            <option value="">All Months</option>
                            <?php foreach ($available_months as $month): ?>
                                <option value="<?php echo esc_attr($month); ?>" <?php selected($selected_month, $month); ?>>
                                    <?php echo date('F Y', strtotime($month)); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <button type="submit" name="filter_submit" class="button">Apply Filters</button>
                        <?php if (!empty($search) || $selected_year || $selected_month): ?>
                            <a href="?page=payment-records" class="button">Clear</a>
                        <?php endif; ?>
                    </div>

                    <!-- Export Button -->
                    <div class="export-section">
                        <button type="button" class="button button-secondary" id="exportButton">Export</button>
                    </div>
                </div>
            </form>
        </div>

        <style>
            .filter-container {
                display: flex;
                flex-wrap: wrap;
                gap: 20px;
                padding: 15px;
                background: #fff;
                border: 1px solid #ccd0d4;
                margin-bottom: 20px;
            }

            .search-section {
                display: flex;
                gap: 8px;
                min-width: 300px;
            }

            .search-section input[type="search"] {
                width: 250px;
                height: 30px;
            }

            .filter-section {
                display: flex;
                gap: 8px;
                align-items: center;
            }

            .filter-section select {
                min-width: 120px;
                height: 30px;
            }

            .export-section {
                margin-left: auto;
            }

            .button {
                height: 30px;
                line-height: 28px;
                padding: 0 12px;
            }

            @media screen and (max-width: 782px) {
                .filter-container {
                    flex-direction: column;
                    gap: 15px;
                }

                .search-section,
                .filter-section,
                .export-section {
                    width: 100%;
                }

                .search-section input[type="search"],
                .filter-section select {
                    width: 100%;
                }

                .filter-section {
                    flex-wrap: wrap;
                }

                .export-section {
                    text-align: right;
                }
            }
            /* Dialog Modal Styling */
            dialog {
                padding: 0;
                border: none;
                border-radius: 8px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
                max-width: 300px;
                width: 90%;
            }

            dialog::backdrop {
                background: rgba(0, 0, 0, 0.5);
            }

            .modal-content {
                padding: 24px;
                text-align: center;
            }

            .modal-content h2 {
                margin-top: 0;
                margin-bottom: 20px;
                color: #23282d;
            }

            .modal-content form {
                display: flex;
                flex-direction: column;
            }

            .modal-content p {
                display: flex;
                gap: 20px;
                justify-content: center;
            }

            .modal-content select {
                margin: 10px 0;
            }

            .close {
                position: absolute;
                right: 15px;
                top: 15px;
                font-size: 24px;
                cursor: pointer;
                color: #666;
                line-height: 1;
            }

            .close:hover {
                color: #000;
            }

            .modal-content .button-primary {
                margin-top: 10px;
                align-self: center;
                background-color: #155724;
            }
 
        </style>
        <!-- Export Modal -->
        <dialog id="exportModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Export Payment Records</h2>
                <form id="exportForm" method="post" action="<?php echo admin_url('admin-ajax.php'); ?>">
                    <input type="hidden" name="action" value="export_payment_records">
                    <?php wp_nonce_field('export_payment_records_nonce', 'export_nonce'); ?>

                    <p>
                        <label>
                            <input type="radio" name="export_type" value="monthly" checked> Monthly
                        </label>
                        <label>
                            <input type="radio" name="export_type" value="yearly"> Yearly
                        </label>
                    </p>

                    <div id="monthSelection">
                        <select name="export_month" style="width:100%;" required>
                            <?php foreach ($available_months as $month): ?>
                                <option value="<?php echo esc_attr($month); ?>">
                                    <?php echo date('F Y', strtotime($month)); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div id="yearSelection" style="display:none;">
                        <select name="export_year" style="width:100%;" required>
                            <?php foreach ($available_years as $year): ?>
                                <option value="<?php echo esc_attr($year); ?>">
                                    <?php echo esc_html($year); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" class="button button-primary">Download CSV</button>
                </form>
            </div>
        </dialog>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th class="donor-details">Donor Details</th>
                    <th class="transaction-details">Transaction Details</th>
                    <th class="status-date">Status & Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payments as $payment): ?>
                    <tr>
                        <td class="donor-details searchable">
                            <strong>Name:</strong> <?php echo esc_html($payment->customer_name); ?><br>
                            <strong>Email:</strong> <?php echo esc_html($payment->customer_email); ?><br>
                            <strong>Phone:</strong> <?php echo esc_html($payment->customer_phone); ?><br>
                            <?php if ($payment->customer_company): ?>
                                <strong>Company:</strong> <?php echo esc_html($payment->customer_company); ?>
                            <?php endif; ?>
                        </td>

                        <td class="transaction-details searchable">
                            <strong>Order ID:</strong> <?php echo esc_html($payment->order_id); ?><br>
                            <strong>Transaction ID:</strong> <?php echo esc_html($payment->transaction_id); ?><br>
                            <strong>Amount:</strong> ₹<?php echo number_format($payment->amount, 2); ?><br>
                            <strong>Payment Method:</strong> <?php echo esc_html($payment->payment_method); ?>
                        </td>

                        <td class="status-date">

                            <br>
                            <span class="payment-status <?php echo strtolower($payment->status); ?>">
                                <?php echo esc_html($payment->status); ?>
                            </span>
                            <br>
                            <span class="payment-date">
                                <?php echo date('d M Y H:i', strtotime($payment->payment_date)); ?>
                            </span>
                            <br>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="tablenav bottom">
            <div class="tablenav-pages">
                <span class="displaying-num"><?php echo $total_items; ?> items</span>
                <span class="pagination-links">
                    <?php if ($current_page > 1): ?>
                        <a class="button prev-page" href="?page=payment-records&paged=<?php echo ($current_page - 1); ?><?php echo !empty($search) ? '&payment_search=' . esc_attr($search) : ''; ?>">
                            <span>‹</span>
                        </a>
                    <?php endif; ?>

                    <span class="paging-input">
                        Page <?php echo $current_page; ?> of <?php echo $total_pages; ?>
                    </span>

                    <?php if ($current_page < $total_pages): ?>
                        <a class="button next-page" href="?page=payment-records&paged=<?php echo ($current_page + 1); ?><?php echo !empty($search) ? '&payment_search=' . esc_attr($search) : ''; ?>">
                            <span>›</span>
                        </a>
                    <?php endif; ?>
                </span>
            </div>
        </div>

        <style>
            .payment-status {
                padding: 3px 8px;
                border-radius: 3px;
                font-weight: bold;
                display: inline-block;
                min-width: 80px;
                text-align: center;
            }

            .payment-status.initiated {
                background: #fff3cd;
                color: #856404;
            }

            .payment-status.charged {
                background: #d4edda;
                color: #155724;
            }

            .payment-status.failed {
                background: #f8d7da;
                color: #721c24;
            }

            .payment-status.pending {
                background: #cce5ff;
                color: #004085;
            }

            /* Updated table styling */
            .wp-list-table th {
                background: #f8f9fa;
                padding: 12px;
                text-align: left;
                font-size: 1.1em;
            }

            .wp-list-table td {
                padding: 15px;
                vertical-align: top;
                line-height: 1.6;
            }

            .wp-list-table td strong {
                color: #555;
                display: inline-block;
                width: 120px;
            }

            .payment-date {
                color: #666;
                font-size: 0.95em;
            }

            .donor-details {
                width: 35%;
            }

            .transaction-details {
                width: 40%;
            }

            .status-date {
                width: 25%;
            }

            /* Search box styling */
            .search-box {
                margin: 1em 0;
                padding: 10px;
                background: #fff;
                border: 1px solid #ccd0d4;
                box-shadow: 0 1px 1px rgba(0, 0, 0, .04);
            }

            .search-box input[type="search"] {
                width: 300px;
                margin-right: 10px;
            }

            /* Pagination styling */
            .tablenav-pages {
                float: right;
                margin: 1em 0;
            }

            .tablenav-pages .button {
                padding: 3px 10px;
                margin: 0 5px;
            }

            .pagination-links {
                margin-left: 10px;
            }

            .displaying-num {
                margin-right: 10px;
                color: #555;
            }

            .paging-input {
                margin: 0 5px;
            }

            /* Add highlight styling */
            .search-highlight {
                background-color: #fff3cd;
                padding: 2px;
                border-radius: 2px;
                font-weight: bold;
            }
        </style>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Search highlight functionality
                const searchInput = document.querySelector('input[name="payment_search"]');
                const searchValue = searchInput.value;

                if (searchValue) {
                    const searchables = document.querySelectorAll('.searchable');
                    searchables.forEach(element => {
                        const text = element.innerHTML;
                        if (text.toLowerCase().includes(searchValue.toLowerCase())) {
                            element.innerHTML = text.replace(new RegExp(searchValue, 'gi'),
                                match => `<span class="search-highlight">${match}</span>`);
                        }
                    });
                }
                // Updated Export modal functionality
                const modal = document.getElementById('exportModal');
                const exportBtn = document.getElementById('exportButton');
                const closeBtn = document.querySelector('.close');
                const exportTypeInputs = document.getElementsByName('export_type');
                const monthSelection = document.getElementById('monthSelection');
                const yearSelection = document.getElementById('yearSelection');

                exportBtn.onclick = function() {
                    modal.showModal();
                }

                closeBtn.onclick = function() {
                    modal.close();
                }

                modal.addEventListener('click', (event) => {
                    if (event.target === modal) {
                        modal.close();
                    }
                });

                exportTypeInputs.forEach(input => {
                    input.addEventListener('change', function() {
                        if (this.value === 'monthly') {
                            monthSelection.style.display = 'block';
                            yearSelection.style.display = 'none';
                        } else {
                            monthSelection.style.display = 'none';
                            yearSelection.style.display = 'block';
                        }
                    });
                });
            });
        </script>
    </div>
<?php
}
