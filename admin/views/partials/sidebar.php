<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="dashboard.php">
            <span class="align-middle">Admin</span>
        </a>

        <ul class="sidebar-nav">

            <li class="sidebar-header">
                Statistik
            </li>

            <li class="sidebar-item <?php if ($title === "Dashboard") echo "active"; ?>">
                <a class="sidebar-link" href="dashboard.php">
                    <i class="bi bi-pie-chart align-middle"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item <?php if ($title === "Buat Data") echo "active"; ?>">
                <a class="sidebar-link" href="new_visit.php">
                    <i class="bi bi-plus-circle align-middle"></i> <span class="align-middle">Buat Data Kunjungan</span>
                </a>
            </li>

            <li class="sidebar-item <?php if ($title === "Kunjungan") echo "active"; ?>">
                <a class="sidebar-link" href="visits.php">
                    <i class="bi bi-file-earmark-medical align-middle"></i> <span class="align-middle">Data Kunjungan</span>
                </a>
            </li>

            <li class="sidebar-item <?php if ($title === "Komentar") echo "active"; ?>">
                <a class="sidebar-link" href="comments.php">
                    <i class="bi bi-chat-dots align-middle"></i> <span class="align-middle">Data Komentar</span>
                </a>
            </li>

            <li class="sidebar-header">
                Data Kuisioner
            </li>

            <li class="sidebar-item <?php if ($title === "Staff") echo "active"; ?>">
                <a class="sidebar-link" href="staff.php">
                    <i class="bi bi-people align-middle"></i> <span class="align-middle">Staff</span>
                </a>
            </li>

            <li class="sidebar-item <?php if ($title === "Tujuan") echo "active"; ?>">
                <a class="sidebar-link" href="purpose.php">
                    <i class="bi bi-receipt-cutoff align-middle"></i> <span class="align-middle">Tujuan</span>
                </a>
            </li>
        </ul>

    </div>
</nav>