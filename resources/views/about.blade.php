<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
{{--    @vite('resources/js/app.js')--}}
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar vh-100 p-3 shadow">
            <div class="profile">
                <img src="https://randomuser.me/api/portraits/men/51.jpg" alt="Profile">
                <div class="name">John Doe</div>
            </div>
            <nav class="nav flex-column">
                <a href="#" class="nav-link active rounded mb-2" onclick="setActive(this)">
                    <i class="bi bi-house-door me-2"></i>Tableau de bord
                </a>
                <a href="#" class="nav-link mb-2" onclick="setActive(this)">
                    <i class="bi bi-briefcase me-2"></i>Users
                </a>
                <a href="#" class="nav-link mb-2" onclick="setActive(this)">
                    <i class="bi bi-tags me-2"></i>Roles
                </a>
                <a href="#" class="nav-link mb-2" onclick="setActive(this)">
                    <i class="bi bi-folder me-2"></i>Rooms
                </a>
                <a href="#" class="nav-link mb-2" onclick="setActive(this)">
                    <i class="bi bi-star me-2"></i>Reservations
                    <span class="badge bg-danger ms-2">3</span>
                </a>
                <a href="#" class="nav-link mb-2" onclick="setActive(this)">
                    <i class="bi bi-bell me-2"></i>Notifications
                    <span class="badge bg-danger ms-2">5</span>
                </a>
                <li class="nav-item">
                    <a class="nav-link" href="/auth/logout" onclick="return confirm('Are you sure you want to logout?')">
                        <i class="bi bi-box-arrow-left"></i> Logout
                    </a>
                </li>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Tableau de bord</h1>
                <div class="w-25">
                    <input type="text" class="form-control" placeholder="Rechercher...">
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="row g-4">
                <div class="col-md-3 col-sm-6">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-clipboard-data me-2"></i>Projets Totaux</h5>
                            <h2 class="card-text text-primary">24</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-pie-chart me-2"></i>Statistiques</h5>
                            <h2 class="card-text text-success">15%</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-person-circle me-2"></i>Utilisateurs</h5>
                            <h2 class="card-text text-warning">240</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-bar-chart-line me-2"></i>Ventes</h5>
                            <h2 class="card-text text-danger">€5000</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body vh-100%">
                <div class="col-md-4 center d-flex">
                    <canvas id="statsChart"></canvas>
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Toggle Dark Mode Button -->
<button class="toggle-mode" onclick="toggleDarkMode()">
    <i class="bi bi-moon"></i> Dark Mode
</button>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function toggleDarkMode() {
        const body = document.body;
        const modeIcon = document.getElementById("mode-icon");

        body.classList.toggle("dark-mode");

        // Change the icon based on the mode
        if (body.classList.contains("dark-mode")) {
            modeIcon.textContent = "☀️"; // Sun icon for light mode
        } else {
            modeIcon.textContent = "🌙"; // Moon icon for dark mode
        }
    }

    // Function to set active state for navigation links
    function setActive(link) {
        const navLinks = document.querySelectorAll(".nav-link");
        navLinks.forEach((navLink) => navLink.classList.remove("active"));
        link.classList.add("active");
    }
</script>

<!-- Custom JS -->
</body>
</html>
