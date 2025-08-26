<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event | Event Manager</title>
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
            --light: #f8f9fa;
            --dark: #212529;
            --success: #4cc9f0;
            --warning: #f72585;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
            min-height: 100vh;
            padding-top: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .card {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: none;
            transition: transform 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .card-header {
            background: linear-gradient(120deg, var(--primary), var(--secondary));
            color: white;
            border-radius: 15px 15px 0 0 !important;
            padding: 20px 25px;
            font-weight: 600;
            font-size: 1.4rem;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.25);
        }
        
        .btn-primary {
            background: linear-gradient(120deg, var(--primary), var(--secondary));
            border: none;
            padding: 10px 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background: linear-gradient(120deg, var(--secondary), var(--primary));
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
        }
        
        .form-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 8px;
        }
        
        .required:after {
            content: " *";
            color: var(--warning);
        }
        
        .form-section {
            border-bottom: 1px dashed #dee2e6;
            padding-bottom: 25px;
            margin-bottom: 25px;
        }
        
        .section-title {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid rgba(67, 97, 238, 0.2);
            display: flex;
            align-items: center;
        }
        
        .section-title i {
            margin-right: 10px;
            background: rgba(67, 97, 238, 0.1);
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .image-upload-container {
            border: 2px dashed #dee2e6;
            border-radius: 10px;
            padding: 25px;
            text-align: center;
            background-color: #f8f9fa;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .image-upload-container:hover {
            border-color: var(--accent);
            background-color: rgba(72, 149, 239, 0.05);
        }
        
        .image-preview {
            max-width: 100%;
            border-radius: 8px;
            margin-top: 15px;
            display: none;
        }
        
        footer {
            text-align: center;
            padding: 20px 0;
            color: #6c757d;
            font-size: 0.9rem;
            margin-top: 40px;
        }
        
        .feature-badge {
            background: rgba(72, 149, 239, 0.1);
            color: var(--accent);
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            margin-left: 8px;
        }

        .is-invalid {
            border-color: #dc3545;
        }

        .invalid-feedback {
            display: block;
        }
        
        @media (max-width: 768px) {
            .card {
                margin: 0 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="text-center mb-5">
                    <h1 class="display-5 fw-bold mb-3">Create Your Event</h1>
                    <p class="lead text-muted">Fill out the form below to create and publish your event</p>
                </div>

                <!-- Display validation errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <h4>Please fix the following errors:</h4>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="bi bi-calendar-event me-2"></i>Event Details
                    </div>
                    <div class="card-body">
                        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" id="eventForm">
                            @csrf
                            <!-- Basic Info Section -->
                            <div class="form-section">
                                <h5 class="section-title"><i class="bi bi-info-circle"></i>Basic Information</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="title" class="form-label required">Event Name</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                               id="title" name="title" value="{{ old('title') }}" 
                                               placeholder="Enter event name" required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="category" class="form-label required">Category</label>
                                        <select class="form-select @error('category') is-invalid @enderror" 
                                                id="category" name="category" required>
                                            <option selected disabled value="">Select category</option>
                                            <option value="conference" {{ old('category') == 'conference' ? 'selected' : '' }}>Conference</option>
                                            <option value="workshop" {{ old('category') == 'workshop' ? 'selected' : '' }}>Workshop</option>
                                            <option value="seminar" {{ old('category') == 'seminar' ? 'selected' : '' }}>Seminar</option>
                                            <option value="social" {{ old('category') == 'social' ? 'selected' : '' }}>Social Gathering</option>
                                            <option value="concert" {{ old('category') == 'concert' ? 'selected' : '' }}>Concert</option>
                                            <option value="sports" {{ old('category') == 'sports' ? 'selected' : '' }}>Sports</option>
                                            <option value="other" {{ old('category') == 'other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                        @error('category')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label required">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" name="description" rows="4" 
                                              placeholder="Describe your event in detail..." required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Date & Time Section -->
                            <div class="form-section">
                                <h5 class="section-title"><i class="bi bi-clock"></i>Date & Time</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="start_date" class="form-label required">Start Date & Time</label>
                                        <input type="datetime-local" class="form-control @error('start_date') is-invalid @enderror" 
                                               id="start_date" name="start_date" value="{{ old('start_date') }}" required>
                                        @error('start_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="end_date" class="form-label required">End Date & Time</label>
                                        <input type="datetime-local" class="form-control @error('end_date') is-invalid @enderror" 
                                               id="end_date" name="end_date" value="{{ old('end_date') }}" required>
                                        @error('end_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="is_recurring" name="is_recurring" value="1"
                                           {{ old('is_recurring') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_recurring">This is a recurring event</label>
                                </div>
                            </div>
                            
                            <!-- Location Section -->
                            <div class="form-section">
                                <h5 class="section-title"><i class="bi bi-geo-alt"></i>Location</h5>
                                <div class="mb-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="location_type" id="physical" value="physical" 
                                               {{ old('location_type', 'physical') == 'physical' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="physical">Physical Location</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="location_type" id="online" value="online"
                                               {{ old('location_type') == 'online' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="online">Online Event</label>
                                    </div>
                                </div>
                                <div id="physicalLocationFields">
                                    <div class="row">
                                        <div class="col-md-8 mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" class="form-control @error('address') is-invalid @enderror" 
                                                   id="address" name="address" value="{{ old('address') }}" 
                                                   placeholder="Enter venue address">
                                            @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="city" class="form-label">City</label>
                                            <input type="text" class="form-control @error('city') is-invalid @enderror" 
                                                   id="city" name="city" value="{{ old('city') }}" 
                                                   placeholder="Enter city">
                                            @error('city')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div id="onlineEventFields" style="display: none;">
                                    <div class="mb-3">
                                        <label for="event_url" class="form-label">Event URL</label>
                                        <input type="url" class="form-control @error('event_url') is-invalid @enderror" 
                                               id="event_url" name="event_url" value="{{ old('event_url') }}" 
                                               placeholder="https://example.com">
                                        @error('event_url')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Media Section -->
                            <div class="form-section">
                                <h5 class="section-title"><i class="bi bi-image"></i>Media</h5>
                                <div class="mb-3">
                                    <label class="form-label">Event Image</label>
                                    <div class="image-upload-container" onclick="document.getElementById('image').click()">
                                        <i class="bi bi-cloud-arrow-up display-4 text-muted mb-3"></i>
                                        <p class="mb-2">Click to upload event image</p>
                                        <p class="text-muted small mb-0">Recommended size: 1200x630 pixels (JPG, PNG)</p>
                                        <img id="imagePreview" class="image-preview" alt="Preview">
                                    </div>
                                    <input type="file" id="image" name="image" accept="image/*" style="display: none;"
                                           class="@error('image') is-invalid @enderror">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Additional Settings -->
                            <div class="form-section">
                                <h5 class="section-title"><i class="bi bi-gear"></i>Additional Settings</h5>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="ticket_type" class="form-label">Ticket Type</label>
                                        <select class="form-select @error('ticket_type') is-invalid @enderror" 
                                                id="ticket_type" name="ticket_type">
                                            <option value="free" {{ old('ticket_type', 'free') == 'free' ? 'selected' : '' }}>Free</option>
                                            <option value="paid" {{ old('ticket_type') == 'paid' ? 'selected' : '' }}>Paid</option>
                                            <option value="donation" {{ old('ticket_type') == 'donation' ? 'selected' : '' }}>Donation</option>
                                        </select>
                                        @error('ticket_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="max_attendees" class="form-label">Maximum Attendees</label>
                                        <input type="number" class="form-control @error('max_attendees') is-invalid @enderror" 
                                               id="max_attendees" name="max_attendees" value="{{ old('max_attendees') }}" 
                                               placeholder="Unlimited" min="1">
                                        @error('max_attendees')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="registration_deadline" class="form-label">Registration Deadline</label>
                                        <input type="datetime-local" class="form-control @error('registration_deadline') is-invalid @enderror" 
                                               id="registration_deadline" name="registration_deadline" value="{{ old('registration_deadline') }}">
                                        @error('registration_deadline')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Visibility</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="visibility" id="public" value="public" 
                                                   {{ old('visibility', 'public') == 'public' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="public">Public</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="visibility" id="private" value="private"
                                                   {{ old('visibility') == 'private' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="private">Private</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="visibility" id="invite_only" value="invite_only"
                                                   {{ old('visibility') == 'invite_only' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="invite_only">Invite Only</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Hidden status field for draft/publish -->
                            <input type="hidden" name="status" id="status" value="published">
                            
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <a href="{{ route('events.index') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left me-2"></i>Cancel
                                </a>
                                <div>
                                    <!-- <button type="button" class="btn btn-outline-primary me-2" onclick="saveDraft()">
                                        <i class="bi bi-save me-2"></i>Save Draft
                                    </button> -->
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle me-2"></i>Create Event
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="alert alert-info">
                    <div class="d-flex">
                        <i class="bi bi-lightbulb fs-3 me-3"></i>
                        <div>
                            <h5>Event Creation Tips</h5>
                            <ul class="mb-0">
                                <li>Add a high-quality image to increase engagement by up to 45%</li>
                                <li>Set your registration deadline at least 48 hours before the event</li>
                                <li>Detailed descriptions help attendees know what to expect</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="container">
        <p class="mb-0">© 2023 Event Manager Pro. All rights reserved.</p>
    </footer>
    
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Handle location type toggle
        document.getElementById('physical').addEventListener('change', function() {
            document.getElementById('physicalLocationFields').style.display = 'block';
            document.getElementById('onlineEventFields').style.display = 'none';
        });
        
        document.getElementById('online').addEventListener('change', function() {
            document.getElementById('physicalLocationFields').style.display = 'none';
            document.getElementById('onlineEventFields').style.display = 'block';
        });
        
        // Handle image preview
        document.getElementById('image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('imagePreview');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });
        
        // Set default datetime values to next week
        const now = new Date();
        const nextWeek = new Date(now.getTime() + 7 * 24 * 60 * 60 * 1000);
        
        // Format for datetime-local input
        const formatDate = (date) => {
            return date.toISOString().slice(0, 16);
        };
        
        // Set defaults only if no old values exist
        if (!document.getElementById('start_date').value) {
            document.getElementById('start_date').value = formatDate(nextWeek);
        }
        if (!document.getElementById('end_date').value) {
            document.getElementById('end_date').value = formatDate(new Date(nextWeek.getTime() + 2 * 60 * 60 * 1000));
        }
        if (!document.getElementById('registration_deadline').value) {
            document.getElementById('registration_deadline').value = formatDate(new Date(nextWeek.getTime() - 48 * 60 * 60 * 1000));
        }

        // Handle save draft functionality
        function saveDraft() {
            document.getElementById('status').value = 'draft';
            document.getElementById('eventForm').submit();
        }

        // Initialize location fields based on current selection
        document.addEventListener('DOMContentLoaded', function() {
            const locationInputs = document.querySelectorAll('input[name="location_type"]');
            locationInputs.forEach(input => {
                if (input.checked) {
                    if (input.value === 'physical') {
                        document.getElementById('physicalLocationFields').style.display = 'block';
                        document.getElementById('onlineEventFields').style.display = 'none';
                    } else {
                        document.getElementById('physicalLocationFields').style.display = 'none';
                        document.getElementById('onlineEventFields').style.display = 'block';
                    }
                }
            });
        });
    </script>
</body>
</html>