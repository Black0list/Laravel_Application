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



const projectsChart = new Chart(document.getElementById('projectsChart'), {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
        datasets: [{
            label: 'Projets',
            data: [12, 19, 3, 5, 2],
            backgroundColor: '#6c5ce7',
            borderColor: '#6c5ce7',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

const statsChart = new Chart(document.getElementById('statsChart'), {
    type: 'pie',
    data: {
        labels: ['Completed', 'In Progress', 'Pending'],
        datasets: [{
            label: 'Statistiques',
            data: [60, 25, 15],
            backgroundColor: ['#28a745', '#ffc107', '#e74c3c']
        }]
    }
});

const usersChart = new Chart(document.getElementById('usersChart'), {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
        datasets: [{
            label: 'Utilisateurs',
            data: [50, 100, 150, 200, 250],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

const salesChart = new Chart(document.getElementById('salesChart'), {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
        datasets: [{
            label: 'Ventes (€)',
            data: [500, 1000, 1500, 2000, 5000],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
