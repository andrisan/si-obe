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

// Criteria Levels
Breadcrumbs::for('criteria-levels.index', function (BreadcrumbTrail $trail, $rubric, $criteria) {
    $trail->parent('home');
    $trail->push($rubric->title, route('rubrics.show', $rubric));
    $trail->push($criteria->title, route('rubrics.criterias.show', [$rubric, $criteria]));
    $trail->push('Criteria Levels', route('rubrics.criterias.criteria-levels.index', [$rubric, $criteria]));
});

// Criteria Levels > Create
Breadcrumbs::for('criteria-levels.create', function (BreadcrumbTrail $trail, $rubric, $criteria) {
    $trail->parent('home');
    $trail->push('Criteria Levels', route('rubrics.criterias.criteria-levels.index', [$rubric, $criteria]));
    $trail->push('Create', route('rubrics.criterias.criteria-levels.create', [$rubric, $criteria]));
});

// Criteria Levels > Edit
Breadcrumbs::for('criteria-levels.edit', function (BreadcrumbTrail $trail, $rubric, $criteria, $criteriaLevel) {
    $trail->parent('home');
    $trail->push('Criteria Levels', route('rubrics.criterias.criteria-levels.index', [$rubric, $criteria]));
    $trail->push('Edit', route('rubrics.criterias.criteria-levels.edit', [$rubric, $criteria, $criteriaLevel]));
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

// ILOs
Breadcrumbs::for('ilos.index', function (BreadcrumbTrail $trail, $syllabus) {
    $trail->parent('home');
    $trail->push('Syllabi', route('syllabi.index'));
    $trail->push(Str::limit($syllabus->title, 30), route('syllabi.show', $syllabus));
    $trail->push('ILOs', route('syllabi.ilos.index', $syllabus));
});

// ILOs > Create
Breadcrumbs::for('ilos.create', function (BreadcrumbTrail $trail, $syllabus) {
    $trail->parent('ilos.index', $syllabus);
    $trail->push('Create', route('syllabi.ilos.create', $syllabus));
});

// ILOs > Edit
Breadcrumbs::for('ilos.edit', function (BreadcrumbTrail $trail, $syllabus, $ilo) {
    $trail->parent('ilos.index', $syllabus);
    $trail->push(Str::limit($ilo->description, 30), route('syllabi.ilos.edit', [$syllabus, $ilo]));
});

// CLOs
Breadcrumbs::for('clos.index', function (BreadcrumbTrail $trail, $syllabus, $ilo) {
    $trail->parent('home');
    $trail->push('Syllabi', route('syllabi.index'));
    $trail->push(Str::limit($syllabus->title, 30), route('syllabi.show', $syllabus));
    $trail->push('ILOs', route('syllabi.ilos.index', $syllabus));
    $trail->push('CLOs', route('syllabi.ilos.clos.index', [$syllabus, $ilo]));
});

// CLOs > Create
Breadcrumbs::for('clos.create', function (BreadcrumbTrail $trail, $syllabus, $ilo) {
    $trail->parent('clos.index', $syllabus, $ilo);
    $trail->push('Create', route('syllabi.ilos.clos.create', [$syllabus, $ilo]));
});

// CLOs > Edit
Breadcrumbs::for('clos.edit', function (BreadcrumbTrail $trail, $syllabus, $ilo, $clo) {
    $trail->parent('clos.index', $syllabus, $ilo);
    $trail->push(Str::limit($clo->description, 30), route('syllabi.ilos.clos.edit', [$syllabus, $ilo, $clo]));
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
