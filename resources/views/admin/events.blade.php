<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events Management</title>
</head>
<body>
    <H1>This is Body</H1>

     <button onclick="window.location.href='{{ url('/events/create') }}'">
        Add Event
    </button>
    <button onclick="window.location.href='{{ url('/events') }}'">
        Show Events
    </button>


</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events Management - EduSphere</title>
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

        /* Sidebar (reuse admin style) */
        .sidebar {
            width: 280px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-right: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }
        .sidebar-header {
            padding: 30px 25px;
            background: linear-gradient(135deg, #990033, #cc0044);
            color: white;
            text-align: center;
        }
        .sidebar-header h1 { font-size: 24px; font-weight: 600; }

        .nav-menu { padding: 20px 0; }
        .nav-item {
            display: block;
            padding: 15px 25px;
            color: #555;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
            font-weight: 500;
        }
        .nav-item:hover, .nav-item.active {
            background: rgba(153, 0, 51, 0.1);
            border-left-color: #990033;
            color: #990033;
            transform: translateX(5px);
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
            padding: 20px 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }
        .welcome-text h2 { font-size: 26px; font-weight: 600; }
        .welcome-text p { color: #666; font-size: 16px; }

        /* Cards for Event Actions */
        .event-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 40px;
        }
        .action-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        .action-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }
        .action-card h3 { font-size: 20px; margin-bottom: 10px; }
        .action-btn {
            display: inline-block;
            padding: 12px 25px;
            margin-top: 15px;
            background: linear-gradient(135deg, #990033, #cc0044);
            color: white;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(153, 0, 51, 0.3);
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
    
        <!-- Main Content -->
        <main class="main-content">
            <div class="top-bar">
                <div class="welcome-text">
                    <h2>Events Management</h2>
                    <p>Quickly add or view your events</p>
                </div>
            </div>

            <!-- Event Action Cards -->
            <div class="event-actions">
                <div class="action-card">
                    <h3>Add New Event</h3>
                    <p>Create and schedule a new event for your institution.</p>
                    <a href="{{ url('/events/create') }}" class="action-btn">➕ Add Event</a>
                </div>
                <div class="action-card">
                    <h3>Show Events</h3>
                    <p>Browse and manage all your upcoming and past events.</p>
                    <a href="{{ url('/events') }}" class="action-btn">📂 View Events</a>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
