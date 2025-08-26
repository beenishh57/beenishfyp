<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student - EduSphere</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary: #990033;
            --secondary: #800029;
            --accent: #b3003b;
            --light: #f8f9fa;
            --dark: #212529;
            --success: #4cc9f0;
            --warning: #f72585;
        }
        
        body {
            background: linear-gradient(135deg, #f9f2f4 0%, #f3e6e9 100%);
            min-height: 100vh;
            padding: 40px 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(153, 0, 51, 0.15);
            overflow: hidden;
        }
        
        .header {
            background: linear-gradient(120deg, var(--primary), var(--secondary));
            color: white;
            padding: 30px;
            position: relative;
        }
        
        .header h1 {
            font-weight: 700;
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
        }
        
        .header p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 0;
        }
        
        .student-avatar {
            position: absolute;
            top: 30px;
            right: 30px;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 4px solid rgba(255, 255, 255, 0.3);
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: var(--primary);
            font-weight: bold;
        }
        
        .card-body {
            padding: 30px;
        }
        
        .form-section {
            border-bottom: 1px dashed #e9ecef;
            padding-bottom: 25px;
            margin-bottom: 25px;
        }
        
        .section-title {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid rgba(153, 0, 51, 0.1);
            display: flex;
            align-items: center;
        }
        
        .section-title i {
            margin-right: 10px;
            background: rgba(153, 0, 51, 0.1);
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
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
        
        .form-control, .form-select {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 12px 15px;
            font-size: 1rem;
            transition: all 0.3s;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 0.25rem rgba(153, 0, 51, 0.25);
        }
        
        .btn-primary {
            background: linear-gradient(120deg, var(--primary), var(--secondary));
            border: none;
            padding: 12px 25px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            background: linear-gradient(120deg, var(--secondary), var(--primary));
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(153, 0, 51, 0.3);
        }
        
        .btn-outline-secondary {
            padding: 12px 25px;
            border-radius: 8px;
        }
        
        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        
        .form-check-input:focus {
            box-shadow: 0 0 0 0.25rem rgba(153, 0, 51, 0.25);
        }
        
        .status-badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.9rem;
        }
        
        .status-active {
            background: rgba(40, 167, 69, 0.15);
            color: #218838;
        }
        
        .status-inactive {
            background: rgba(108, 117, 125, 0.15);
            color: #495057;
        }
        
        .alert-container {
            max-width: 800px;
            margin: 20px auto;
        }
        
        .alert-danger {
            border-left: 4px solid #dc3545;
        }
        
        .info-card {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            border-left: 4px solid var(--primary);
        }
        
        @media (max-width: 768px) {
            .header {
                text-align: center;
                padding: 20px;
            }
            
            .student-avatar {
                position: relative;
                top: 0;
                right: 0;
                margin: 0 auto 15px;
            }
            
            .btn-container {
                flex-direction: column;
                gap: 10px;
            }
            
            .btn-container .btn {
                width: 100%;
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>
    <div class="alert-container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <h5><i class="bi bi-exclamation-circle me-2"></i>Please fix the following errors:</h5>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    
    <div class="container">
        <div class="header">
            <div class="student-avatar">
                {{ substr($student->name, 0, 1) }}
            </div>
            <h1><i class="bi bi-pencil-square me-2"></i>Edit Student</h1>
            <p>Update {{ $student->name }}'s information in the EduSphere system</p>
        </div>
        
        <div class="card-body">
            <form action="{{ route('update.student', $student->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <!-- Basic Information Section -->
                <div class="form-section">
                    <h5 class="section-title"><i class="bi bi-person-badge"></i>Basic Information</h5>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="name" class="form-label required">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" 
                                   value="{{ old('name', $student->name) }}" 
                                   placeholder="Enter student's full name" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="email" class="form-label required">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" 
                                   value="{{ old('email', $student->email) }}" 
                                   placeholder="Enter student's email" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone" 
                                   value="{{ old('phone', $student->phone ?? '') }}" 
                                   placeholder="Enter phone number">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="student_id" class="form-label">Student ID</label>
                            <input type="text" class="form-control" id="student_id" name="student_id" 
                                   value="{{ old('student_id', $student->student_id ?? '') }}" 
                                   placeholder="Enter student ID">
                        </div>
                    </div>
                </div>
                
                <!-- Account Status Section -->
                <div class="form-section">
                    <h5 class="section-title"><i class="bi bi-shield-lock"></i>Account Settings</h5>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Account Status</label>
                            <div class="info-card">
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="is_approved" 
                                           name="is_approved" value="1" 
                                           {{ $student->is_approved ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_approved">
                                        Approved (can login)
                                    </label>
                                </div>
                                
                                <div class="status-badge {{ $student->is_approved ? 'status-active' : 'status-inactive' }}">
                                    <i class="bi bi-{{ $student->is_approved ? 'check-circle' : 'x-circle' }} me-1"></i>
                                    {{ $student->is_approved ? 'Active Account' : 'Inactive Account' }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <label for="program" class="form-label">Academic Program</label>
                            <select class="form-select" id="program" name="program">
                                <option value="">Select program</option>
                                <option value="Computer Science" {{ old('program', $student->program ?? '') == 'Computer Science' ? 'selected' : '' }}>Computer Science</option>
                                <option value="Business Administration" {{ old('program', $student->program ?? '') == 'Business Administration' ? 'selected' : '' }}>Business Administration</option>
                                <option value="Engineering" {{ old('program', $student->program ?? '') == 'Engineering' ? 'selected' : '' }}>Engineering</option>
                                <option value="Arts & Humanities" {{ old('program', $student->program ?? '') == 'Arts & Humanities' ? 'selected' : '' }}>Arts & Humanities</option>
                                <option value="Health Sciences" {{ old('program', $student->program ?? '') == 'Health Sciences' ? 'selected' : '' }}>Health Sciences</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <!-- Enrollment Details -->
                <div class="form-section">
                    <h5 class="section-title"><i class="bi bi-calendar-check"></i>Enrollment Details</h5>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="enrollment_date" class="form-label">Enrollment Date</label>
                            <input type="date" class="form-control" id="enrollment_date" name="enrollment_date" 
                                   value="{{ old('enrollment_date', $student->enrollment_date ?? '') }}">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="graduation_date" class="form-label">Expected Graduation</label>
                            <input type="date" class="form-control" id="graduation_date" name="graduation_date" 
                                   value="{{ old('graduation_date', $student->graduation_date ?? '') }}">
                        </div>
                    </div>
                </div>
                
                <!-- Form Actions -->
                <div class="d-flex justify-content-between align-items-center mt-5 flex-wrap btn-container">
                    <a href="{{ route('manage.students') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-2"></i>Cancel
                    </a>
                    <div class="d-flex">
                        <button type="reset" class="btn btn-outline-secondary me-2">
                            <i class="bi bi-arrow-counterclockwise me-2"></i>Reset
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-2"></i>Update Student
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div class="container mt-4">
        <div class="info-card">
            <div class="d-flex">
                <i class="bi bi-info-circle fs-4 me-3 text-primary"></i>
                <div>
                    <h5>Student Management Tips</h5>
                    <ul class="mb-0">
                        <li>Double-check email addresses to ensure communication delivery</li>
                        <li>Use the account status toggle to temporarily disable student access</li>
                        <li>Keep student records updated for accurate academic reporting</li>
                        <li>Regularly verify student contact information</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Update status badge when checkbox changes
        document.getElementById('is_approved').addEventListener('change', function() {
            const statusBadge = document.querySelector('.status-badge');
            if (this.checked) {
                statusBadge.className = 'status-badge status-active';
                statusBadge.innerHTML = '<i class="bi bi-check-circle me-1"></i>Active Account';
            } else {
                statusBadge.className = 'status-badge status-inactive';
                statusBadge.innerHTML = '<i class="bi bi-x-circle me-1"></i>Inactive Account';
            }
        });
        
        // Add avatar color change effect
        const avatar = document.querySelector('.student-avatar');
        avatar.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
            this.style.transition = 'transform 0.3s ease';
        });
        
        avatar.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    </script>
</body>
</html>