
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - EduSphere</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-right: 1px solid rgba(255, 255, 255, 0.2);
            padding: 0;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar-header {
            padding: 30px 25px;
            background: linear-gradient(135deg, #990033, #cc0044);
            color: white;
            text-align: center;
        }

        .sidebar-header h1 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .sidebar-header p {
            font-size: 14px;
            opacity: 0.9;
        }

        .nav-menu {
            padding: 20px 0;
        }

        .nav-item {
            display: block;
            padding: 15px 25px;
            color: #555;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
            font-weight: 500;
        }

        .nav-item:hover {
            background: rgba(153, 0, 51, 0.1);
            border-left-color: #990033;
            color: #990033;
            transform: translateX(5px);
        }

        .nav-item.active {
            background: rgba(153, 0, 51, 0.1);
            border-left-color: #990033;
            color: #990033;
        }

        .nav-item i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 20px 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .welcome-text h2 {
            color: #333;
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .welcome-text p {
            color: #666;
            font-size: 16px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #990033, #cc0044);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 18px;
        }

        .logout-btn {
            padding: 10px 20px;
            background: #e74c3c;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 3px 10px rgba(231, 76, 60, 0.3);
        }

        .logout-btn:hover {
            background: #c0392b;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.4);
        }

        /* Dashboard Cards */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .dashboard-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .card-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            font-size: 24px;
            color: white;
        }

        .card-icon.users { background: linear-gradient(135deg, #3498db, #2980b9); }
        .card-icon.teachers { background: linear-gradient(135deg, #e67e22, #d35400); }
        .card-icon.students { background: linear-gradient(135deg, #27ae60, #229954); }
        .card-icon.settings { background: linear-gradient(135deg, #8e44ad, #7d3c98); }

        .card-title {
            font-size: 20px;
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }

        .card-subtitle {
            color: #666;
            font-size: 14px;
        }

        .card-action {
            display: inline-flex;
            align-items: center;
            padding: 12px 25px;
            background: linear-gradient(135deg, #990033, #cc0044);
            color: white;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
            margin-top: 15px;
        }

        .card-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(153, 0, 51, 0.3);
        }

        /* Stats Section */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 25px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .stat-number {
            font-size: 32px;
            font-weight: bold;
            color: #990033;
            margin-bottom: 5px;
        }

        .stat-label {
            color: #666;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .dashboard-container {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                position: fixed;
                bottom: 0;
                height: auto;
                z-index: 1000;
            }
            
            .nav-menu {
                display: flex;
                padding: 10px;
                overflow-x: auto;
            }
            
            .nav-item {
                white-space: nowrap;
                padding: 15px 20px;
            }
            
            .main-content {
                padding: 20px;
                padding-bottom: 100px;
            }
            
            .top-bar {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
        }

        /* Loading Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dashboard-card {
            animation: fadeInUp 0.6s ease forwards;
        }

        .dashboard-card:nth-child(2) { animation-delay: 0.1s; }
        .dashboard-card:nth-child(3) { animation-delay: 0.2s; }
        .dashboard-card:nth-child(4) { animation-delay: 0.3s; }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <nav class="sidebar">
            <div class="sidebar-header">
                <h1>EduSphere</h1>
                <p>Admin Dashboard</p>
            </div>
            <div class="nav-menu">
                <a href="#" class="nav-item active">
                    <i>🏠</i> Dashboard
                </a>
                <a href="{{ route('approve.user.page') }}" class="nav-item">
                    <i>✓</i> Approve Users
                </a>
                <a href="{{ route('manage.teachers') }}" class="nav-item">
                    <i>👨‍🏫</i> Manage Teachers
                </a>
                <a href="{{ route('manage.students') }}" class="nav-item">
                    <i>👨‍🎓</i> Manage Students
                </a>
                <a href="{{ route('manage.events') }}" class="nav-item">
                    <i>📅</i> Manage Events
                </a>
                <a href="{{ route('admin.lectures.view') }}" class="nav-item">
                    <i>📅</i> Lecture Schedule
                </a>
                <a href="{{ route('admin.lectures.create') }}" class="nav-item">
                    <i>+</i> Assign New Lecture
                </a>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Top Bar -->
            <div class="top-bar">
                <div class="welcome-text">
                    <h2>Welcome back, Admin</h2>
                    <p>Here's what's happening with your platform today</p>
                </div>
                <div class="user-info">
                    <div class="user-avatar">A</div>
                    <a href="{{ route('logout') }}" class="logout-btn">Logout</a>
                </div>
            </div>

            <!-- Dashboard Cards -->
            <div class="dashboard-grid">
                <div class="dashboard-card">
                    <div class="card-header">
                        <div class="card-icon users">👥</div>
                        <div>
                            <div class="card-title">User Approvals</div>
                            <div class="card-subtitle">Review and approve new registrations</div>
                        </div>
                    </div>
                    <a href="{{ route('approve.user.page') }}" class="card-action">
                        Review Pending Users →
                    </a>
                </div>

                <div class="dashboard-card">
                    <div class="card-header">
                        <div class="card-icon teachers">👨‍🏫</div>
                        <div>
                            <div class="card-title">Teacher Management</div>
                            <div class="card-subtitle">Manage teacher accounts and permissions</div>
                        </div>
                    </div>
                    <a href="{{ route('manage.teachers') }}" class="card-action">
                        Manage Teachers →
                    </a>
                </div>
                <div class="dashboard-card">
                <div class="card-header">
                        <div class="card-icon students">📋</div>
                        <div>
                            <div class="card-title">Student Attendance</div>
                            <div class="card-subtitle">View attendance of all classes</div>
                        </div>
                    </div>
                    <a href="{{ route('admin.attendance.view') }}" class="card-action">
                        View Attendance → 
                    </a>
                </div>
                <div class="dashboard-card">
                    <div class="card-header">
                        <div class="card-icon students">👨‍🎓</div>
                        <div>
                            <div class="card-title">Student Management</div>
                            <div class="card-subtitle">Oversee student accounts and progress</div>
                        </div>
                    </div>
                    <a href="{{ route('manage.students') }}" class="card-action">
                        Manage Students →
                    </a>
                </div>

                <div class="dashboard-card">
                    <div class="card-header">
                        <div class="card-icon events">📅</div>
                        <div>
                            <div class="card-title">Event Management</div>
                            <div class="card-subtitle">Add and manage academic events</div>
                        </div>
                    </div>
                    <a href="{{ route('manage.events') }}" class="card-action">
                        Manage Events →
                    </a>
                </div>
                
                <div class="dashboard-card">
                    <div class="card-header">
                        <div class="card-icon events">📅</div>
                        <div>
                            <div class="card-title">Contact Messages</div>
                            <div class="card-subtitle">Manage Visiters</div>
                        </div>
                    </div>
                    <a href="{{ route('admin.contact.messages') }}" class="card-action">
                        Manage Visiters →
                    </a>
                </div>
            </div>

            <!-- Stats Section -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">{{ $stats['pending_approvals'] }}</div>
                    <div class="stat-label">Pending Approvals</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $stats['active_teachers'] }}</div>
                    <div class="stat-label">Active Teachers</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $stats['total_students'] }}</div>
                    <div class="stat-label">Total Students</div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Add interactive functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Highlight active navigation item
            const navItems = document.querySelectorAll('.nav-item');
            const currentPath = window.location.pathname;
            
            navItems.forEach(item => {
                if (item.getAttribute('href') === currentPath) {
                    item.classList.add('active');
                }
            });

            // Add click animations to cards
            const cards = document.querySelectorAll('.dashboard-card');
            cards.forEach(card => {
                card.addEventListener('click', function(e) {
                    if (!e.target.closest('.card-action')) {
                        const action = this.querySelector('.card-action');
                        if (action) {
                            action.click();
                        }
                    }
                });
            });

            // Simulate real-time updates for stats
            const statNumbers = document.querySelectorAll('.stat-number');
            setInterval(() => {
                // Randomly update the pending approvals count
                if (Math.random() < 0.1) { // 10% chance every interval
                    const pendingApprovals = statNumbers[0];
                    const currentValue = parseInt(pendingApprovals.textContent);
                    const change = Math.random() < 0.5 ? -1 : 1;
                    const newValue = Math.max(0, currentValue + change);
                    pendingApprovals.textContent = newValue;
                }
            }, 5000);
        });
    </script>
</body>
</html>