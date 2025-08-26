<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Middleware\EnsureUserIsTeacher;
use App\Http\Controllers\TeacherController;
use App\Models\Event;
use App\Models\Attendance;
use App\Models\Lecture;
use App\Http\Controllers\StudentController;


// Route::get('/home', function () {   
//     return view('home');
// });
Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');





// routes/web.php
Route::get('/register', function () {
    return view('register');
})->name('register');



Route::post('/register', function (Request $request) {
    // You should validate and store to DB (mock logic here)
    $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required',
        'role' => 'required|in:admin,student,teacher'
    ]);

    // Example: store in `users` table with role column
            \App\Models\User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => $validated['role'],
            'is_approved' => false, // 👈 add this line
        ]);


    return redirect('/home')->with('success', 'Registered successfully!');
})->name('register.submit');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if ($user->role !== 'admin' && !$user->is_approved) {
            Auth::logout();
            return back()->withErrors(['email' => 'Your account is pending approval by the admin.']);
        }


        // Role-based redirect
        if ($user->role === 'admin') {
            return redirect('/admin/dashboard');
        } elseif ($user->role === 'teacher') {
            return redirect('/teacher/dashboard');
        } elseif ($user->role === 'student') {
            return redirect('/student/dashboard');
        }

        return redirect('/');
    }

    return back()->withErrors(['email' => 'Invalid credentials']);
})->name('login.submit');

// Route::get('/logout', function () {
//     Auth::logout();
//     return redirect('/login');
// })->name('logout');

Route::get('/logout', function (\Illuminate\Http\Request $request) {
    Auth::logout();

    // Destroy session completely
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
})->name('logout');


// Admin dashboard page
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
     ->name('admin.dashboard')
     ->middleware('auth');

Route::get('/admin/attendance', [AdminController::class, 'viewAllAttendance'])->name('admin.attendance.view');



Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])
    ->middleware(['auth', 'teacher'])
    ->name('teacher.dashboard');    

Route::get('/student/dashboard', function () {
    return view('student.dashboard');
})->middleware(['auth'])->name('student.dashboard');




// Admin approval page
Route::get('/admin/approvals', function () {
    // $users = \App\Models\User::where('is_approved', false)->get();
    $users = \App\Models\User::where('is_approved', false)
            ->where('role', '!=', 'admin')
            ->get();

    return view('admin.approvals', compact('users'));
})->name('approve.user.page')->middleware('auth');

// Admin approve user action
Route::post('/admin/approve/{id}', function ($id) {
    $user = \App\Models\User::findOrFail($id);
    $user->is_approved = true;
    $user->save();

    return redirect()->route('approve.user.page')->with('success', 'User approved.');
})->name('approve.user')->middleware('auth');


// Teacher Management Page
Route::get('/admin/teachers', function () {
    $teachers = \App\Models\User::where('role', 'teacher')->get();
    return view('admin.teachers', compact('teachers'));
})->name('manage.teachers')->middleware('auth');

// Teacher Approval/Deapproval Route
Route::post('/admin/toggle-approval/{id}', function ($id) {
    $user = \App\Models\User::findOrFail($id);
    
    if ($user->role === 'teacher') {
        $user->is_approved = !$user->is_approved;
        $user->save();
        
        $action = $user->is_approved ? 'approved' : 'deapproved';
        return back()->with('success', "Teacher $action successfully.");
    }
    
    return back()->withErrors(['error' => 'Invalid user role']);
})->name('toggle.approval')->middleware('auth');


// Student Management Routes
Route::get('/admin/students', function () {
    $students = \App\Models\User::where('role', 'student')->get();
    return view('admin.students', compact('students'));
})->name('manage.students')->middleware('auth');

Route::get('/admin/students/edit/{id}', function ($id) {
    $student = \App\Models\User::findOrFail($id);
    
    // Ensure only students can be edited
    if ($student->role !== 'student') {
        abort(403, 'Unauthorized action');
    }
    
    return view('admin.edit-student', compact('student'));
})->name('edit.student')->middleware('auth');

Route::put('/admin/students/update/{id}', function (Request $request, $id) {
    $student = \App\Models\User::findOrFail($id);
    
    // Validate input
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,'.$student->id,
        'is_approved' => 'sometimes|boolean'
    ]);

    // Update student
    $student->update([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'is_approved' => $request->has('is_approved') ? true : false
    ]);

    return redirect()->route('manage.students')->with('success', 'Student updated successfully!');
})->name('update.student')->middleware('auth');

Route::delete('/admin/students/delete/{id}', function ($id) {
    $student = \App\Models\User::findOrFail($id);
    
    if ($student->role === 'student') {
        $student->delete();
        return redirect()->route('manage.students')->with('success', 'Student deleted successfully!');
    }

    return back()->withErrors(['error' => 'Invalid operation']);
})->name('delete.student')->middleware('auth');


Route::get('/admin/events', function () {
    return view('admin.events'); // You'll need to create this view
})->name('manage.events')->middleware('auth');


// Resource route for events
Route::resource('events', EventController::class);


// Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
// Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::get('/events/drafts', [EventController::class, 'drafts'])->name('events.drafts');

// If you need additional custom routes
Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');


Route::middleware(['auth', 'teacher'])->group(function () {
   Route::get('/teacher/profile/edit', function () {
    $user = Auth::user();
    $upcomingEvents = Event::where('start_date', '>=', now())
                        ->orderBy('start_date')
                        ->take(5)
                        ->get();

    return view('teacher.edit-profile', compact('user', 'upcomingEvents'));
})->name('teacher.profile.edit');

    Route::post('/teacher/profile/update', function (Request $request) {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }

        $user->save();

        return redirect()->route('teacher.dashboard')->with('success', 'Profile updated successfully!');
    })->name('teacher.profile.update');
});


Route::post('/admin/teachers/assign-class/{id}', function (Request $request, $id) {
    $request->validate([
        'class_assigned' => 'nullable|integer|min:1|max:10',
    ]);

    $teacher = \App\Models\User::findOrFail($id);

    if ($teacher->role !== 'teacher') {
        return back()->with('error', 'Invalid user type.');
    }

    $teacher->class_assigned = $request->class_assigned;
    $teacher->save();

    return back()->with('success', 'Class assigned successfully.');
})->name('admin.teachers.assign.class')->middleware('auth');



Route::post('/admin/students/assign-class/{id}', function (Request $request, $id) {
    $request->validate([
        'class_assigned' => 'nullable|integer|min:1|max:10',
    ]);

    $student = User::findOrFail($id);

    if ($student->role !== 'student') {
        return back()->with('error', 'Invalid user type.');
    }

    $student->class_assigned = $request->class_assigned;
    $student->save();

    return back()->with('success', 'Class assigned successfully.');
})->name('admin.students.assign.class')->middleware('auth');


Route::get('/teacher/students/class', function () {
    $teacher = Auth::user();

    if ($teacher->role !== 'teacher') {
        abort(403);
    }

    // Fetch students of the same class
    $students = User::where('role', 'student')
                    ->where('class_assigned', $teacher->class_assigned)
                    ->get();

    return view('teacher.attendance-form', compact('students', 'teacher'));
})->middleware(['auth', 'teacher'])->name('teacher.class.students');


Route::post('/teacher/attendance', function (Request $request) {
    $teacher = Auth::user();
    $date = now()->toDateString();

    $request->validate([
        'attendance' => 'required|array',
    ]);

    foreach ($request->attendance as $studentId => $status) {
        Attendance::updateOrCreate(
            [
                'student_id' => $studentId,
                'teacher_id' => $teacher->id,
                'date' => $date,
            ],
            [
                'status' => $status,
            ]
        );
    }

    return back()->with('success', 'Attendance submitted successfully.');
})->middleware(['auth', 'teacher'])->name('teacher.attendance.submit');


// Add this route to your web.php file

Route::get('/teacher/attendance/view', function () {
    $teacher = Auth::user();

    if ($teacher->role !== 'teacher') {
        abort(403);
    }

    // Get all attendance records for students in teacher's class
    $attendances = Attendance::with(['student', 'teacher'])
                    ->whereHas('student', function($query) use ($teacher) {
                        $query->where('class_assigned', $teacher->class_assigned);
                    })
                    ->where('teacher_id', $teacher->id)
                    ->orderBy('date', 'desc')
                    ->paginate(20);

    return view('teacher.attendance-view', compact('attendances', 'teacher'));
})->middleware(['auth', 'teacher'])->name('teacher.attendance.view');


// Add this route to your web.php file

Route::get('/teacher/attendance/view', function (Request $request) {
    $teacher = Auth::user();

    if ($teacher->role !== 'teacher') {
        abort(403);
    }

    // Build query with filters
    $query = Attendance::with(['student', 'teacher'])
                ->whereHas('student', function($q) use ($teacher) {
                    $q->where('class_assigned', $teacher->class_assigned);
                })
                ->where('teacher_id', $teacher->id);

    // Apply date filter
    if ($request->filled('date')) {
        $query->whereDate('date', $request->date);
    }

    // Apply status filter
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    // Get paginated results
    $attendances = $query->orderBy('date', 'desc')->paginate(20);

    return view('teacher.attendance-view', compact('attendances', 'teacher'));
})->middleware(['auth', 'teacher'])->name('teacher.attendance.view');


// Attendance form display and submission
Route::get('/teacher/attendance/mark', [TeacherController::class, 'showAttendanceForm'])->name('teacher.attendance.mark');
Route::post('/teacher/attendance/mark', [TeacherController::class, 'submitAttendance'])->name('teacher.attendance.submit');

// Optional: Edit existing attendance
// Route::get('/teacher/attendance/edit/{date}', [TeacherController::class, 'editAttendance'])->name('teacher.attendance.edit');
// Route::post('/teacher/attendance/update/{date}', [TeacherController::class, 'updateAttendance'])->name('teacher.attendance.update');
Route::get('/teacher/attendance/edit/{student}/{date}', [TeacherController::class, 'editStudentAttendance'])->name('teacher.attendance.edit.student');
Route::post('/teacher/attendance/update/{student}/{date}', [TeacherController::class, 'updateStudentAttendance'])->name('teacher.attendance.update.student');


 Route::get('/admin/lectures/add-lectures', [AdminController::class, 'viewLectureSchedule'])->name('admin.lectures.view');
Route::get('/admin/all-lectures', [\App\Http\Controllers\AdminController::class, 'viewLectures'])->name('admin.all-lectures');

Route::get('/admin/lectures/create', [AdminController::class, 'createLecture'])->name('admin.lectures.create');
Route::post('/admin/lectures/store', [AdminController::class, 'storeLecture'])->name('admin.lectures.store');


Route::get('/teacher/lectures', [\App\Http\Controllers\TeacherController::class, 'myLectures'])
    ->middleware(['auth', 'teacher'])
    ->name('teacher.lectures');


    Route::get('/student/lectures', function () {
    $student = Auth::user();
    $lectures = Lecture::where('class', $student->class_assigned)->orderBy('date')->get();

    return view('student.lectures', compact('lectures'));
})->middleware(['auth'])->name('student.lectures');

Route::get('/student/lectures', function () {
    $student = Auth::user();

    if ($student->role !== 'student') {
        abort(403);
    }

    $lectures = \App\Models\Lecture::with('teacher')
        ->where('class', $student->class_assigned)
        ->orderBy('day_of_week')
        ->orderBy('start_time')
        ->get();

    return view('student.lectures', compact('lectures'));
})->middleware(['auth'])->name('student.lectures');


Route::get('/student/attendance', function (Request $request) {
    $student = Auth::user();

    if ($student->role !== 'student') {
        abort(403);
    }

    $query = Attendance::with('teacher')
        ->where('student_id', $student->id);

    if ($request->filled('date')) {
        $query->whereDate('date', $request->date);
    }

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    $attendances = $query->orderByDesc('date')->paginate(10);

    return view('student.attendance', compact('attendances'));
})->middleware('auth')->name('student.attendance');


Route::middleware(['auth'])->group(function () {
    Route::get('/student/profile', [StudentController::class, 'profile'])->name('student.profile');
    Route::post('/student/profile', [StudentController::class, 'updateProfile'])->name('student.profile.update');
}); 


Route::get('/teacher/profile', function () {
    $user = Auth::user();
    $upcomingEvents = \App\Models\Event::where('start_date', '>=', now())
        ->orderBy('start_date')
        ->take(5)
        ->get();

    return view('teacher.edit-profile', compact('user', 'upcomingEvents'));
})->name('teacher.profile')->middleware(['auth', 'teacher']);


// Contact form submission
Route::post('/contact', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'nullable|string',
        'message' => 'required|string',
    ]);

    \App\Models\ContactMessage::create($validated);

    return redirect()->back()->with('success', 'Your message has been sent successfully!');
})->name('contact.submit');

// Admin contact messages management
Route::get('/admin/contact-messages', function (Request $request) {
    // Check if user is admin
    if (Auth::user()->role !== 'admin') {
        abort(403);
    }

    $filter = $request->get('filter', 'all');
    
    $query = \App\Models\ContactMessage::query();
    
    if ($filter === 'unread') {
        $query->unread();
    }
    
    $messages = $query->orderBy('created_at', 'desc')->paginate(10);
    
    $unreadCount = \App\Models\ContactMessage::unread()->count();
    $totalCount = \App\Models\ContactMessage::count();
    
    return view('admin.contact-messages', compact('messages', 'unreadCount', 'totalCount'));
})->name('admin.contact.messages')->middleware('auth');

Route::get('/admin/contact-messages/{id}', function ($id) {
    // Check if user is admin
    if (Auth::user()->role !== 'admin') {
        abort(403);
    }
    
    $message = \App\Models\ContactMessage::findOrFail($id);
    return response()->json($message);
})->middleware('auth');

Route::post('/admin/contact-messages/{id}/mark-read', function ($id) {
    // Check if user is admin
    if (Auth::user()->role !== 'admin') {
        abort(403);
    }
    
    $message = \App\Models\ContactMessage::findOrFail($id);
    $message->markAsRead();
    
    return response()->json(['success' => true]);
})->name('admin.contact.markRead')->middleware('auth');

Route::delete('/admin/contact-messages/{id}', function ($id) {
    // Check if user is admin
    if (Auth::user()->role !== 'admin') {
        abort(403);
    }
    
    $message = \App\Models\ContactMessage::findOrFail($id);
    $message->delete();
    
    return redirect()->route('admin.contact.messages')->with('success', 'Message deleted successfully.');
})->name('admin.contact.delete')->middleware('auth');

