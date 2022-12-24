<?php
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Illuminate\Support\Str;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('dashboard'));
});

// Faculties
Breadcrumbs::for('faculties.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Faculties', route('faculties.index'));
});

// Faculty Create
Breadcrumbs::for('faculties.create', function (BreadcrumbTrail $trail) {
    $trail->parent('faculties.index');
    $trail->push('Create', route('faculties.create'));
});

// Faculty Edit
Breadcrumbs::for('faculties.edit', function (BreadcrumbTrail $trail, $faculty) {
    $trail->parent('faculties.index');
    $trail->push($faculty->name, route('faculties.edit', $faculty));
});

// Departments
Breadcrumbs::for('departments.index', function (BreadcrumbTrail $trail, $faculty) {
    $trail->parent('home');
    $trail->push('Faculties', route('faculties.index'));
    $trail->push('Departments', route('faculties.departments.index', $faculty));
});

// Department Create
Breadcrumbs::for('departments.create', function (BreadcrumbTrail $trail, $faculty) {
    $trail->parent('departments.index', $faculty);
    $trail->push('Create');
});

// Department Edit
Breadcrumbs::for('departments.edit', function (BreadcrumbTrail $trail, $faculty, $department) {
    $trail->parent('departments.index', $faculty);
    $trail->push($department->name, route('faculties.departments.edit', [$faculty, $department]));
});

// Study Programs
Breadcrumbs::for('study-programs.index', function (BreadcrumbTrail $trail, $faculty, $department) {
    $trail->parent('home');
    $trail->push($faculty->name, route('faculties.index'));
    $trail->push($department->name, route('faculties.departments.index', $faculty));
    $trail->push('Study Programs', route('faculties.departments.study-programs.index', [$faculty, $department]));
});

// Department Create
Breadcrumbs::for('study-programs.create', function (BreadcrumbTrail $trail, $faculty, $department) {
    $trail->parent('study-programs.index', $faculty, $department);
    $trail->push('Create');
});

// Department Edit
Breadcrumbs::for('study-programs.edit', function (BreadcrumbTrail $trail, $faculty, $department, $studyProgram) {
    $trail->parent('study-programs.index', $faculty, $department);
    $trail->push($studyProgram->name, route('faculties.departments.study-programs.edit', [$faculty, $department, $studyProgram]));
});

// Syllabi
Breadcrumbs::for('syllabi.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Syllabi', route('syllabi.index'));
});

// Syllabi > Show
Breadcrumbs::for('syllabi.show', function (BreadcrumbTrail $trail, $syllabus) {
    $trail->parent('home');
    $trail->push('Syllabi', route('syllabi.index'));
    $trail->push($syllabus->title, route('syllabi.show', $syllabus));
});

// Syllabi > Create
Breadcrumbs::for('syllabi.create', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Syllabi', route('syllabi.index'));
    $trail->push('Create', route('syllabi.create'));
});

// Syllabi > Edit
Breadcrumbs::for('syllabi.edit', function (BreadcrumbTrail $trail, $syllabus) {
    $trail->parent('home');
    $trail->push('Syllabi', route('syllabi.index'));
    $trail->push($syllabus->title, route('syllabi.show', $syllabus));
    $trail->push('Edit', route('syllabi.edit', $syllabus));
});

// Learning PLans
Breadcrumbs::for('learning-plans.index', function (BreadcrumbTrail $trail, $syllabus) {
    $trail->parent('home');
    $trail->push($syllabus->title, route('syllabi.show', $syllabus));
    $trail->push('Learning Plans', route('syllabi.learning-plans.index', $syllabus));
});

// Learning PLans > Create
Breadcrumbs::for('learning-plans.create', function (BreadcrumbTrail $trail, $syllabus) {
    $trail->parent('learning-plans.index', $syllabus);
    $trail->push('Create', route('syllabi.learning-plans.create', $syllabus));
});

// Learning PLans > Edit
Breadcrumbs::for('learning-plans.edit', function (BreadcrumbTrail $trail, $syllabus, $learningPlan) {
    $trail->parent('learning-plans.index', $syllabus);
    $trail->push("Edit", route('syllabi.learning-plans.edit', [$syllabus, $learningPlan]));
});

// For all children of syllabi
Breadcrumbs::for('syllabi.*', function (BreadcrumbTrail $trail, $syllabus) {
    $trail->parent('home');
    $trail->push("Syllabi", route('syllabi.index'));
    $trail->push($syllabus->title, route('syllabi.show', $syllabus));
});

// Assignment Plan Tasks > Create
Breadcrumbs::for('assignment-plan-tasks.create', function (BreadcrumbTrail $trail, $syllabus) {
    $trail->parent('syllabi.*', $syllabus);
    $trail->push('Create New Assignment Plan Task');
});

// Assignment Plan Tasks > Edit
Breadcrumbs::for('assignment-plan-tasks.edit', function (BreadcrumbTrail $trail, $syllabus, $assignmentPlanTask) {
    $trail->parent('syllabi.*', $syllabus);
    $trail->push(Str::limit($assignmentPlanTask->description, 30));
});

// Assignment Plans
Breadcrumbs::for('assignment-plans.index', function (BreadcrumbTrail $trail, $syllabus) {
    $trail->parent('home');
    $trail->push("Syllabi", route('syllabi.index'));
    $trail->push($syllabus->title, route('syllabi.show', $syllabus));
});

// Assignment Plans > Create
Breadcrumbs::for('assignment-plans.create', function (BreadcrumbTrail $trail, $syllabus) {
    $trail->parent('assignment-plans.index', $syllabus);
    $trail->push('Create Assignment Plan', route('syllabi.assignment-plans.create', $syllabus));
});

// Assignment Plans > Edit
Breadcrumbs::for('assignment-plans.edit', function (BreadcrumbTrail $trail, $syllabus, $assignmentPlan) {
    $trail->parent('assignment-plans.index', $syllabus);
    $trail->push("Edit Assignment Plan", route('syllabi.assignment-plans.edit', [$syllabus, $assignmentPlan]));
});

// Learing Outcomes
Breadcrumbs::for('learning-outcomes.index', function (BreadcrumbTrail $trail, $syllabus) {
    $trail->parent('home');
    $trail->push('Syllabi', route('syllabi.index'));
    $trail->push($syllabus->title, route('syllabi.show', $syllabus));
});

// ILOs > Create
Breadcrumbs::for('ilos.create', function (BreadcrumbTrail $trail, $syllabus) {
    $trail->parent('learning-outcomes.index', $syllabus);
    $trail->push('Create ILO');
});

// ILOs > Edit
Breadcrumbs::for('ilos.edit', function (BreadcrumbTrail $trail, $syllabus, $ilo) {
    $trail->parent('learning-outcomes.index', $syllabus);
    $trail->push(Str::limit($ilo->description, 30));
});

// CLOs > Create
Breadcrumbs::for('clos.create', function (BreadcrumbTrail $trail, $syllabus) {
    $trail->parent('learning-outcomes.index', $syllabus);
    $trail->push('Create CLO');
});

// CLOs > Edit
Breadcrumbs::for('clos.edit', function (BreadcrumbTrail $trail, $syllabus, $clo) {
    $trail->parent('learning-outcomes.index', $syllabus);
    $trail->push(Str::limit($clo->description, 30));
});

// LLOs > Create
Breadcrumbs::for('llos.create', function (BreadcrumbTrail $trail, $syllabus) {
    $trail->parent('learning-outcomes.index', $syllabus);
    $trail->push('Create LLO');
});

// LLOs > Edit
Breadcrumbs::for('llos.edit', function (BreadcrumbTrail $trail, $syllabus, $llo) {
    $trail->parent('learning-outcomes.index', $syllabus);
    $trail->push(Str::limit($llo->description, 30));
});

// Courses
Breadcrumbs::for('courses.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Courses', route('courses.index'));
});

// Courses > Show
Breadcrumbs::for('courses.show', function (BreadcrumbTrail $trail, $course) {
    $trail->parent('home');
    $trail->push('Courses', route('courses.index'));
    $trail->push($course->name, route('courses.show', $course));
});

// Courses > Create
Breadcrumbs::for('courses.create', function (BreadcrumbTrail $trail) {
    $trail->parent('courses.index');
    $trail->push('Create', route('courses.create'));
});

// Courses > Edit
Breadcrumbs::for('courses.edit', function (BreadcrumbTrail $trail, $course) {
    $trail->parent('home');
    $trail->push('Courses', route('courses.index'));
    $trail->push($course->name, route('courses.show', $course));
    $trail->push('Edit', route('courses.edit', $course));
});

// Course classes
Breadcrumbs::for('classes.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Classes', route('classes.index'));
});

// Course classes > Create
Breadcrumbs::for('classes.create', function (BreadcrumbTrail $trail) {
    $trail->parent('classes.index');
    $trail->push('Create', route('classes.create'));
});

// Course classes > Edit
Breadcrumbs::for('classes.edit', function (BreadcrumbTrail $trail, $class) {
    $trail->parent('classes.index');
    $trail->push($class->name, route('classes.show', $class));
    $trail->push('Edit', route('classes.edit', $class));
});

// Course classes > Join
Breadcrumbs::for('classes.join', function (BreadcrumbTrail $trail) {
    $trail->parent('classes.index');
    $trail->push('Join', route('classes.join'));
});

// Course classes > Settings
Breadcrumbs::for('classes.settings', function (BreadcrumbTrail $trail, $class) {
    $trail->parent('classes.index');
    $trail->push($class->name, route('classes.show', $class));
    $trail->push('Settings');
});

// Classes members > Show
Breadcrumbs::for('class-members.show', function (BreadcrumbTrail $trail, $class) {
    $trail->parent('home');
    $trail->push($class->name, route('classes.show', $class));
    $trail->push('Members');
});

// Rubrics
Breadcrumbs::for('rubrics.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Rubrics', route('rubrics.index'));
});

// Rubrics > Create
Breadcrumbs::for('rubrics.create', function (BreadcrumbTrail $trail, $syllabus) {
    $trail->parent('home');
    $trail->push(Str::limit($syllabus->title, 30), route('syllabi.show', $syllabus));
    $trail->push('Create', route('rubrics.create'));
});

// Rubrics > Show
Breadcrumbs::for('rubrics.show', function (BreadcrumbTrail $trail, $syllabus, $rubric) {
    $trail->parent('home');
    $trail->push(Str::limit($syllabus->title, 30), route('syllabi.show', $syllabus));
    $trail->push(Str::limit($rubric->title, 30), route('rubrics.show', $rubric));
});

// Criterias > Create
Breadcrumbs::for('criterias.create', function (BreadcrumbTrail $trail, $rubric) {
    $trail->parent('home');
    $trail->push(Str::limit($rubric->title, 30), route('rubrics.show', $rubric));
    $trail->push('Create Criteria');
});

// Criterias > Edit
Breadcrumbs::for('criterias.edit', function (BreadcrumbTrail $trail, $rubric, $criteria) {
    $trail->parent('home');
    $trail->push(Str::limit($rubric->title, 30), route('rubrics.show', $rubric));
    $trail->push(Str::limit($criteria->title, 30));
});

// Criteria Levels > Create
Breadcrumbs::for('criteria-levels.create', function (BreadcrumbTrail $trail, $rubric) {
    $trail->parent('home');
    $trail->push(Str::limit($rubric->title, 30), route('rubrics.show', $rubric));
    $trail->push('Create Criteria Level');
});

// Criteria Levels > Edit
Breadcrumbs::for('criteria-levels.edit', function (BreadcrumbTrail $trail, $rubric, $criteriaLevel) {
    $trail->parent('home');
    $trail->push(Str::limit($rubric->title, 30), route('rubrics.show', $rubric));
    $trail->push(Str::limit($criteriaLevel->title, 30));
});

// Student Grades
Breadcrumbs::for('student-grades.index', function (BreadcrumbTrail $trail, $assignment) {
    $trail->parent('home');
    $class = $assignment->courseClass;
    $trail->push(Str::limit($class->name, 30), route('classes.show', $class));
    $trail->push(Str::limit($assignment->assignmentPlan->title, 30), route('classes.assignments.show', [$class, $assignment]));
    $trail->push('Student Grades', route('student-grades.index', [
        'assignment_id' => $assignment->id
    ]));
});

// Student Grades > Edit
Breadcrumbs::for('student-grades.edit', function (BreadcrumbTrail $trail, $assignment) {
    $trail->parent('student-grades.index', $assignment);
    $trail->push('Edit');
});

// Student Grades > Create
Breadcrumbs::for('student-grades.create', function (BreadcrumbTrail $trail, $assignment) {
    $trail->parent('student-grades.index', $assignment);
    $trail->push('Create');
});

// Class Portfolios
Breadcrumbs::for('class-portofolio.index', function (BreadcrumbTrail $trail, $class) {
    $trail->parent('home');
    $trail->push(Str::limit($class->name, 30), route('classes.show', $class));
    $trail->push('LLO Portfolio', route('class-portofolio.index', $class));
});

// Class Portfolios > Student
Breadcrumbs::for('class-portofolio.student', function (BreadcrumbTrail $trail, $class) {
    $trail->parent('home');
    $trail->push(Str::limit($class->name, 30), route('classes.show', $class));
    $trail->push('Student Portfolio', route('class-portofolio.index', $class));
});

// Profile > Grade
Breadcrumbs::for('profile.grade', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Profile', route('profile.show'));
    $trail->push('Grade', route('profile.grade'));
});
