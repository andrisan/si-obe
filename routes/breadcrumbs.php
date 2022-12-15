<?php
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

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
