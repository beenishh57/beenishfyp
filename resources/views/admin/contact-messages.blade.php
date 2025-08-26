<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Messages - Admin | EduSphere</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
        }

        /* Navbar */
        .navbar {
            background-color: #990033;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 40px;
            color: white;
        }

        .navbar .logo {
            font-size: 22px;
            font-weight: bold;
        }

        .navbar ul {
            list-style: none;
            display: flex;
            gap: 20px;
            margin: 0;
            padding: 0;
        }

        .navbar ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        /* Admin Container */
        .admin-container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .admin-title {
            font-size: 24px;
            color: #990033;
        }

        .messages-count {
            background: #990033;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 14px;
        }

        /* Messages Table */
        .messages-table {
            width: 100%;
            border-collapse: collapse;
        }

        .messages-table th,
        .messages-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .messages-table th {
            background-color: #f8f9fa;
            font-weight: bold;
            color: #495057;
        }

        .messages-table tr:hover {
            background-color: #f8f9fa;
        }

        .unread {
            background-color: #f0f8ff;
            font-weight: bold;
        }

        .message-preview {
            max-width: 300px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .action-btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .view-btn {
            background: #990033;
            color: white;
        }

        .view-btn:hover {
            background: #770029;
        }

        .mark-read-btn {
            background: #28a745;
            color: white;
        }

        .mark-read-btn:hover {
            background: #218838;
        }

        .delete-btn {
            background: #dc3545;
            color: white;
        }

        .delete-btn:hover {
            background: #c82333;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: black;
        }

        .message-details {
            margin-top: 20px;
        }

        .message-details p {
            margin: 10px 0;
        }

        /* Filter Section */
        .filter-section {
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .filter-btn {
            padding: 8px 16px;
            background: #6c757d;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .filter-btn.active {
            background: #990033;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .messages-table {
                display: block;
                overflow-x: auto;
            }
            
            .admin-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            
            .filter-section {
                flex-wrap: wrap;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">EduSphere Admin</div>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('manage.teachers') }}">Teachers</a></li>
            <li><a href="{{ route('manage.students') }}">Students</a></li>
            <li><a href="{{ route('manage.events') }}">Events</a></li>
            <li><a href="{{ route('admin.contact.messages') }}" style="font-weight: bold;">Contact Messages</a></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
        </ul>
    </div>

    <!-- Admin Container -->
    <div class="admin-container">
        <div class="admin-header">
            <h1 class="admin-title">Contact Messages</h1>
            <div class="messages-count">
                {{ $unreadCount }} Unread / {{ $totalCount }} Total
            </div>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <a href="{{ route('admin.contact.messages', ['filter' => 'all']) }}" 
               class="filter-btn {{ request('filter', 'all') === 'all' ? 'active' : '' }}">All Messages</a>
            <a href="{{ route('admin.contact.messages', ['filter' => 'unread']) }}" 
               class="filter-btn {{ request('filter') === 'unread' ? 'active' : '' }}">Unread Only</a>
        </div>

        <!-- Messages Table -->
        <table class="messages-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message Preview</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $message)
                    <tr class="{{ $message->read_at ? '' : 'unread' }}">
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->phone ?? 'N/A' }}</td>
                        <td class="message-preview" title="{{ $message->message }}">
                            {{ Str::limit($message->message, 50) }}
                        </td>
                        <td>{{ $message->created_at->format('M d, Y H:i') }}</td>
                        <td>
                            @if($message->read_at)
                                <span style="color: #28a745;">Read</span>
                            @else
                                <span style="color: #dc3545; font-weight: bold;">Unread</span>
                            @endif
                        </td>
                        <td>
                            <button class="action-btn view-btn" onclick="viewMessage({{ $message->id }})">View</button>
                            @if(!$message->read_at)
                                <form action="{{ route('admin.contact.markRead', $message->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="action-btn mark-read-btn">Mark Read</button>
                                </form>
                            @endif
                            <form action="{{ route('admin.contact.delete', $message->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn delete-btn" onclick="return confirm('Are you sure you want to delete this message?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center;">No contact messages found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div style="margin-top: 20px;">
            {{ $messages->links() }}
        </div>
    </div>

    <!-- Modal for Viewing Message -->
    <div id="messageModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Message Details</h2>
            <div class="message-details" id="messageDetails">
                <!-- Content will be loaded via AJAX -->
            </div>
        </div>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("messageModal");
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Function to view message details
        function viewMessage(messageId) {
            // Fetch message details via AJAX
            fetch(`/admin/contact-messages/${messageId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('messageDetails').innerHTML = `
                        <p><strong>Name:</strong> ${data.name}</p>
                        <p><strong>Email:</strong> ${data.email}</p>
                        <p><strong>Phone:</strong> ${data.phone || 'N/A'}</p>
                        <p><strong>Date:</strong> ${new Date(data.created_at).toLocaleString()}</p>
                        <p><strong>Message:</strong></p>
                        <p style="background: #f9f9f9; padding: 15px; border-radius: 5px;">${data.message}</p>
                    `;
                    modal.style.display = "block";
                    
                    // Mark as read if unread
                    if (!data.read_at) {
                        fetch(`/admin/contact-messages/${messageId}/mark-read`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            }
                        }).then(() => {
                            // Reload page to update status
                            setTimeout(() => location.reload(), 1000);
                        });
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
</body>
</html>