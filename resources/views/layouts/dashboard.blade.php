<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="/css/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --background-light: #f5f7fa;
            --background-dark: #1e1e2f;
            --text-light: #292828;
            --text-dark: #ffffff;
            --card-bg-light: #ffffff;
            --card-bg-dark: #2a2a3f;
            --sidebar-bg-light: #f8f9fa;
            --sidebar-bg-dark: #25253d;
            --sidebar-hover: #6c5ce7;
            --card-hover: #f1f1f1;
            --primary-color: #6c5ce7;
            --success-color: #28a745;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
            --muted-text: #a5a5a5;
        }

        body {
            background-color: var(--background-light);
            color: var(--text-light);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .fixed-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        body.dark-mode {
            background-color: var(--background-dark);
            color: var(--text-dark);
        }

        .sidebar {
            background-color: var(--sidebar-bg-light);
            transition: background-color 0.3s ease;
        }

        .dark-mode .sidebar {
            background-color: var(--sidebar-bg-dark);
        }

        .sidebar .profile {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
        }

        .sidebar .profile img {
            border-radius: 50%;
            width: 50px;
            height: 50px;
            margin-right: 15px;
        }

        .sidebar .profile .name {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text-light);
        }

        .dark-mode .sidebar .profile .name {
            color: var(--text-dark);
        }

        .sidebar .nav-link {
            display: flex;
            align-items: center;
            color: var(--text-light);
            padding: 10px 15px;
            border-radius: 5px;
            margin: 5px 0;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .dark-mode .sidebar .nav-link {
            color: var(--text-dark);
        }

        .sidebar .nav-link:hover {
            background-color: var(--sidebar-hover);
            color: white;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
            font-size: 1.5rem;
        }

        .nav-link.active {
            background-color: var(--primary-color);
            color: white;
        }

        .card {
            background-color: var(--card-bg-light);
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .dark-mode .card {
            background-color: var(--card-bg-dark);
        }

        .card-title, .card-text {
            color: var(--text-light);
        }

        .dark-mode .card-title,
        .dark-mode .card-text {
            color: var(--text-dark);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .card-text {
            font-size: 1.75rem;
            font-weight: 700;
        }

        .card-footer {
            background-color: transparent;
            border-top: none;
        }

        .bi-house-door { color: #d80884; }
        .bi-briefcase { color: #28a745; }
        .bi-tags { color: #f39c12; }
        .bi-folder { color: #f39c12; }
        .bi-star { color: #e74c3c; }
        .bi-bell { color: #e74c3c; }

        .toggle-mode {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 50px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background-color 0.3s ease;
        }

        .toggle-mode:hover {
            background-color: #5b4bc4;
        }

        input[type="text"] {
            border-radius: 25px;
            padding: 10px 20px;
            border: 2px solid #ccc;
            width: 100%;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus {
            border-color: var(--primary-color);
        }

        @media (max-width: 768px) {
            .sidebar {
                position: absolute;
                top: 0;
                left: -100%;
                transition: left 0.3s ease;
                height: 100%;
                width: 250px;
                z-index: 9999;
            }

            .sidebar.show {
                left: 0;
            }

            .sidebar .profile img {
                width: 40px;
                height: 40px;
            }

            .sidebar .profile .name {
                font-size: 1rem;
            }

            .card {
                margin-bottom: 20px;
            }

            .nav-link {
                font-size: 1rem;
                padding: 8px 12px;
            }

            .toggle-mode {
                bottom: 10px;
                right: 10px;
                padding: 8px 15px;
            }
        }


    </style>
</head>
<body>
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
@endif
@if (session('failed'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('failed') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar vh-100% p-3 shadow">
            <div class="profile">
                <img src="https://randomuser.me/api/portraits/men/51.jpg" alt="Profile">
                <div class="name">
                    {{ Auth::user()->name }}
                </div>
            </div>
            <nav class="nav flex-column">
                <a href="/admin/stats" class="nav-link rounded mb-2" onclick="setActive(this)">
                    <i class="bi bi-house-door me-2"></i>Tableau de bord
                </a>
                <a href="/admin/users" class="nav-link mb-2" onclick="setActive(this)">
                    <i class="bi bi-briefcase me-2"></i>Users
                </a>
                <a href="/admin/roles" class="nav-link mb-2" onclick="setActive(this)">
                    <i class="bi bi-tags me-2"></i>Roles
                </a>
                <a href="/rooms" class="nav-link mb-2" onclick="setActive(this)">
                    <i class="bi bi-folder me-2"></i>Rooms
                </a>
                <a href="/admin/reservations" class="nav-link mb-2" onclick="setActive(this)">
                    <i class="bi bi-star me-2"></i>Reservations
                    <span class="badge bg-danger ms-2">3</span>
                </a>
                <a href="/notifications" class="nav-link mb-2" onclick="setActive(this)">
                    <i class="bi bi-bell me-2"></i>Notifications
                    <span class="badge bg-danger ms-2">5</span>
                </a>
                <li class="nav-item">
                    <a class="nav-link" href="/logout" onclick="return confirm('Are you sure you want to logout?')">
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
                    <input id="search" type="text" class="form-control" placeholder="Rechercher...">
                </div>
            </div>

            <div class="card-body  bg-body-secondary mt-3 rounded">
                <div class="center">
                    @yield('content')
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


<script>
    function toggleDarkMode() {
        document.body.classList.toggle('dark-mode');
        localStorage.setItem('dark-mode', document.body.classList.contains('dark-mode'));
    }

    // function setActive(element) {
    //     document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
    //     element.classList.add('active');
    //     localStorage.setItem('active-item', element.getAttribute('href'));
    // }

    document.addEventListener("DOMContentLoaded", () => {
        if (localStorage.getItem('dark-mode') === 'true') {
            document.body.classList.add('dark-mode');
        }
        // const activeItem = localStorage.getItem('active-item');
        // if (activeItem) {
        //     document.querySelector(`.nav-link[href='${activeItem}']`)?.classList.add('active');
        // }

        const isDarkMode = localStorage.getItem("dark-mode") === "enabled";
        if (isDarkMode) {
            updateModalDarkMode(newDarkModeState);
        }

        document.getElementById("toggle-dark-mode").addEventListener("click", function () {
            document.querySelector(".modal-content").classList.toggle("bg-dark");
            document.querySelector(".modal-content").classList.toggle("text-white");

            localStorage.setItem("dark-mode",
                document.body.classList.contains("dark-mode") ? "enabled" : "disabled"
            );
        });
    });

</script>
<!-- Custom JS -->
</body>
</html>
