<?php
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('dashboard'));
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
