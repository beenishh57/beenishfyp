    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Events Management</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
        <style>
            :root {
                --primary: #4361ee;
                --secondary: #3f37c9;
                --accent: #4895ef;
                --success: #4cc9f0;
                --warning: #f72585;
                --danger: #dc3545;
            }

            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
                min-height: 100vh;
                padding: 20px 0;
            }

            .container {
                max-width: 1000px;
                margin: 0 auto;
                background-color: #fff;
                padding: 30px;
                border-radius: 15px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            }

            h1 {
                text-align: center;
                color: #333;
                margin-bottom: 30px;
                font-weight: 600;
                background: linear-gradient(120deg, var(--primary), var(--secondary));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            .btn-add-event {
                background: linear-gradient(120deg, var(--primary), var(--secondary));
                color: white;
                border: none;
                padding: 12px 25px;
                border-radius: 8px;
                font-weight: 600;
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                transition: all 0.3s ease;
                margin-bottom: 25px;
            }

            .btn-add-event:hover {
                background: linear-gradient(120deg, var(--secondary), var(--primary));
                transform: translateY(-2px);
                box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
                color: white;
            }

            .btn-add-event i {
                margin-right: 8px;
            }

            .events-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
                gap: 20px;
                margin-top: 20px;
            }

            .event-card {
                background: white;
                border-radius: 12px;
                padding: 20px;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
                border: 1px solid #e3e6f0;
                transition: all 0.3s ease;
                cursor: pointer;
                position: relative;
            }

            .event-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
                border-color: var(--accent);
            }

            .event-title {
                font-size: 1.2rem;
                font-weight: 600;
                color: #333;
                margin-bottom: 8px;
                display: flex;
                align-items: center;
            }

            .event-title i {
                margin-right: 8px;
                color: var(--primary);
            }

            .event-date {
                color: #666;
                font-size: 0.95rem;
                margin-bottom: 15px;
                display: flex;
                align-items: center;
            }

            .event-date i {
                margin-right: 6px;
                color: var(--accent);
            }

            .event-description {
                color: #777;
                font-size: 0.9rem;
                margin-bottom: 15px;
                line-height: 1.4;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .event-meta {
                display: flex;
                gap: 10px;
                margin-bottom: 15px;
            }

            .event-badge {
                background: rgba(67, 97, 238, 0.1);
                color: var(--primary);
                padding: 4px 10px;
                border-radius: 15px;
                font-size: 0.8rem;
                font-weight: 500;
            }

            .event-actions {
                display: flex;
                gap: 8px;
                margin-top: 15px;
                padding-top: 15px;
                border-top: 1px solid #e9ecef;
            }

            .btn-sm {
                padding: 6px 12px;
                font-size: 0.875rem;
                border-radius: 6px;
                font-weight: 500;
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                transition: all 0.3s ease;
            }

            .btn-edit {
                background: linear-gradient(45deg, #28a745, #20c997);
                color: white;
                border: none;
            }

            .btn-edit:hover {
                background: linear-gradient(45deg, #218838, #1ea56a);
                transform: translateY(-1px);
                color: white;
            }

            .btn-delete {
                background: linear-gradient(45deg, var(--danger), #e74c3c);
                color: white;
                border: none;
            }

            .btn-delete:hover {
                background: linear-gradient(45deg, #c82333, #c0392b);
                transform: translateY(-1px);
                color: white;
            }

            .btn-sm i {
                margin-right: 4px;
            }

            .empty-state {
                text-align: center;
                padding: 60px 20px;
                color: #6c757d;
            }

            .empty-state i {
                font-size: 4rem;
                color: #dee2e6;
                margin-bottom: 20px;
            }

            .modal-header {
                background: linear-gradient(120deg, var(--primary), var(--secondary));
                color: white;
                border-radius: 0.5rem 0.5rem 0 0;
            }

            .modal-title {
                font-weight: 600;
            }

            .event-detail-item {
                margin-bottom: 15px;
                padding: 10px;
                background: #f8f9fa;
                border-radius: 6px;
                border-left: 4px solid var(--accent);
            }

            .event-detail-label {
                font-weight: 600;
                color: #495057;
                margin-bottom: 5px;
            }

            .event-detail-value {
                color: #6c757d;
            }

            @media (max-width: 768px) {
                .events-grid {
                    grid-template-columns: 1fr;
                }
                
                .container {
                    margin: 0 15px;
                    padding: 20px;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1><i class="bi bi-calendar-event me-3"></i>Events Management</h1>
            <a href="{{ route(Auth::user()->role . '.dashboard') }}" class="btn btn-outline-secondary mb-3">
                <i class="bi bi-arrow-left"></i> Back to Dashboard
            </a>
            @if(Auth::user()->role === 'admin')
                <a href="{{ url('/events/create') }}" class="btn-add-event">
                    <i class="bi bi-plus-circle"></i>Add New Event
                </a>
            @endif


            @if(isset($events) && count($events) > 0)
                <div class="events-grid">
                    @foreach($events as $event)
                        <div class="event-card" onclick="showEventDetails({{ json_encode($event) }})">
                            <div class="event-title">
                                <i class="bi bi-calendar-event"></i>
                                {{ $event->title }}
                            </div>
                            <div class="event-date">
                                <i class="bi bi-calendar3"></i>
                                {{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}
                                @if(isset($event->start_time))
                                    at {{ \Carbon\Carbon::parse($event->start_time)->format('g:i A') }}
                                @endif
                            </div>
                            @if(isset($event->description))
                                <div class="event-description">
                                    {{ $event->description }}
                                </div>
                            @endif
                            <div class="event-meta">
                                @if(isset($event->category))
                                    <span class="event-badge">{{ ucfirst($event->category) }}</span>
                                @endif
                                @if(isset($event->location))
                                    <span class="event-badge">
                                        <i class="bi bi-geo-alt"></i> {{ $event->location }}
                                    </span>
                                @endif
                            </div>
                            @if(Auth::user()->role === 'admin')
                                <div class="event-actions" onclick="event.stopPropagation();">
                                    <a href="{{ url('/events/' . $event->id . '/edit') }}" class="btn-sm btn-edit">
                                        <i class="bi bi-pencil"></i>Edit
                                    </a>
                                    <button class="btn-sm btn-delete" onclick="confirmDelete({{ $event->id }}, '{{ $event->title }}')">
                                        <i class="bi bi-trash"></i>Delete
                                    </button>
                                </div>
                            @endif

                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <i class="bi bi-calendar-x"></i>
                    <h3>No Events Found</h3>
                    <p>You haven't created any events yet. Click "Add New Event" to get started!</p>
                </div>
            @endif
        </div>

        <!-- Event Details Modal -->
        <div class="modal fade" id="eventDetailsModal" tabindex="-1" aria-labelledby="eventDetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eventDetailsModalLabel">
                            <i class="bi bi-info-circle me-2"></i>Event Details
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="eventDetailsContent">
                        <!-- Event details will be populated here -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="deleteConfirmModalLabel">
                            <i class="bi bi-exclamation-triangle me-2"></i>Confirm Delete
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete the event "<strong id="eventToDelete"></strong>"?</p>
                        <p class="text-muted">This action cannot be undone.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form id="deleteForm" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash me-2"></i>Delete Event
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Image Preview Modal -->
        <div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title" id="imagePreviewModalLabel"><i class="bi bi-image me-2"></i>Preview Image</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img id="previewImage" src="" class="img-fluid rounded shadow" alt="Event Image Preview">
                    </div>
                </div>
            </div>
        </div>


        <!-- Bootstrap JS Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script>

       function showEventDetails(event) {
        const modalContent = document.getElementById('eventDetailsContent');

        function formatDate(dateString) {
            if (!dateString) return '';
            const date = new Date(dateString);
            return date.toLocaleDateString('en-US', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
        }

        function formatTime(timeString) {
            if (!timeString) return '';
            const time = new Date(`2000-01-01T${timeString}`);
            return time.toLocaleTimeString('en-US', {
                hour: 'numeric',
                minute: '2-digit',
                hour12: true
            });
        }

        let detailsHTML = `
            <div class="event-detail-item"><div class="event-detail-label">Event Title</div><div class="event-detail-value">${event.title || '-'}</div></div>
            ${event.description ? `<div class="event-detail-item"><div class="event-detail-label">Description</div><div class="event-detail-value">${event.description}</div></div>` : ''}
            ${event.start_date ? `<div class="event-detail-item"><div class="event-detail-label">Start Date</div><div class="event-detail-value">${formatDate(event.start_date)}</div></div>` : ''}
            ${event.end_date ? `<div class="event-detail-item"><div class="event-detail-label">End Date</div><div class="event-detail-value">${formatDate(event.end_date)}</div></div>` : ''}
            ${event.registration_deadline ? `<div class="event-detail-item"><div class="event-detail-label">Registration Deadline</div><div class="event-detail-value">${formatDate(event.registration_deadline)}</div></div>` : ''}
            ${event.category ? `<div class="event-detail-item"><div class="event-detail-label">Category</div><div class="event-detail-value">${capitalize(event.category)}</div></div>` : ''}
            ${event.ticket_type ? `<div class="event-detail-item"><div class="event-detail-label">Ticket Type</div><div class="event-detail-value">${capitalize(event.ticket_type)}</div></div>` : ''}
            ${event.max_attendees ? `<div class="event-detail-item"><div class="event-detail-label">Max Attendees</div><div class="event-detail-value">${event.max_attendees}</div></div>` : ''}
            ${event.is_recurring !== null ? `<div class="event-detail-item"><div class="event-detail-label">Is Recurring</div><div class="event-detail-value">${event.is_recurring ? 'Yes' : 'No'}</div></div>` : ''}
            ${event.visibility ? `<div class="event-detail-item"><div class="event-detail-label">Visibility</div><div class="event-detail-value">${capitalize(event.visibility)}</div></div>` : ''}
            ${event.status ? `<div class="event-detail-item"><div class="event-detail-label">Status</div><div class="event-detail-value">${capitalize(event.status)}</div></div>` : ''}
            ${event.location_type ? `<div class="event-detail-item"><div class="event-detail-label">Location Type</div><div class="event-detail-value">${capitalize(event.location_type)}</div></div>` : ''}
        `;

        if (event.address || event.city || event.location) {
            let fullLocation = event.location || '';
            if (event.address) fullLocation = event.address;
            if (event.city) fullLocation += `, ${event.city}`;
            detailsHTML += `
                <div class="event-detail-item">
                    <div class="event-detail-label">Location</div>
                    <div class="event-detail-value">${fullLocation}</div>
                </div>
            `;
        }

        if (event.event_url) {
            detailsHTML += `
                <div class="event-detail-item">
                    <div class="event-detail-label">Event URL</div>
                    <div class="event-detail-value"><a href="${event.event_url}" target="_blank">${event.event_url}</a></div>
                </div>
            `;
        }


    if (event.image_path) {
    const cleanedPath = event.image_path.replace(/^public\//, '');
    const imageURL = `${window.location.origin}/storage/${cleanedPath}`;

    detailsHTML += `
        <div class="event-detail-item">
            <div class="event-detail-label">Event Image</div>
            <div class="event-detail-value">
                <img src="${imageURL}" 
                     alt="Event Image" 
                     class="img-fluid rounded shadow-sm" 
                     style="max-height: 200px; cursor: pointer;"
                     onclick="previewImage('${imageURL}')">
            </div>
        </div>
    `;
}



        modalContent.innerHTML = detailsHTML;

        const modal = new bootstrap.Modal(document.getElementById('eventDetailsModal'));
        modal.show();
    }

    function capitalize(str) {
        return str.charAt(0).toUpperCase() + str.slice(1);
    }

            
            function confirmDelete(eventId, eventTitle) {
                document.getElementById('eventToDelete').textContent = eventTitle;
                document.getElementById('deleteForm').action = `/events/${eventId}`;
                
                const modal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
                modal.show();
            }
            
            // Add click event listeners to prevent card click when clicking action buttons
            document.addEventListener('DOMContentLoaded', function() {
                const actionContainers = document.querySelectorAll('.event-actions');
                actionContainers.forEach(container => {
                    container.addEventListener('click', function(e) {
                        e.stopPropagation();
                    });
                });
            });

            function previewImage(imageURL) {
    const img = document.getElementById('previewImage');
    img.src = imageURL;

    const modal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
    modal.show();
}

        </script>
    </body>
    </html>