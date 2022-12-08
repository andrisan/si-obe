<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseClass;
use App\Models\LessonLearningOutcome;

class ClassPortofolioController extends Controller
{
    public function index(CourseClass $courseClass)
    {
        //menghitung jumlah mahasiswa lulus dan tidak lulus
        $berhasil = 0;
        $tidakBerhasil = 0;
        $temp = 0;

        foreach ($courseClass->students as $student) {
            $temp = 0;
            foreach ($student->studentGrade as $sg) {
                $temp += $sg->criteriaLevel->point;
            }
            if ($temp > 50) {
                $berhasil++;
            } else {
                $tidakBerhasil++;
            }
        }

        //mendapatkan total nilai untuk setiap sub cpmk
        $llo = LessonLearningOutcome::all();
        $llo_achieve = collect();
        foreach ($llo as $llo) {
            $lulus = 0;
            $critPointTotal = 0;

            foreach ($llo->criteria as $criteria) {
                if ($llo->id != $criteria->llo_id) {
                    continue;
                }
                $critPointTotal += $criteria->max_point;
            }

            foreach ($courseClass->students as $student) {
                $clPointTotal = 0;

                foreach ($llo->criteria as $criteria) {
                    if ($llo->id != $criteria->llo_id) {
                        continue;
                    }
                    
                    foreach ($student->studentGrade as $sg) {
                        if ($sg->student_user_id != $student->id) {
                            continue;
                        }
                        if ($sg->criteriaLevel->criteria_id != $criteria->id) {
                            continue;
                        }
                        $clPointTotal += $sg->criteriaLevel->point;
                    }
                }
                if ($clPointTotal >= $critPointTotal / 2) {
                    $lulus++;
                }
            }
            $llo_achieve->push(['lulus' => $lulus, 'description' => $llo->description, 'maxPoint' => $critPointTotal]);
        }

        return view('class-portofolio.index', [
            'cc' => $courseClass,
            'lulus' => $berhasil,
            'gagal' => $tidakBerhasil,
            'lloTotalPoint' => $llo_achieve,
            'studentSum' => $courseClass->students->count()
        ]);
    }

    public function student(CourseClass $courseClass)
    {
        $dataReturn = collect();
        foreach ($courseClass->students as $student) {
            $nim = $student->studentData->student_id_number;
            $name = $student->name;
            $cpmk = collect();
            $llo = LessonLearningOutcome::all();
            foreach ($llo as $llo) {
                $temp = 0;
                $maxPoint = 0;
                foreach ($llo->criteria as $criteria) {
                    foreach ($student->studentGrade as $sg) {
                        if ($criteria->id != $sg->criteriaLevel->criteria_id) {
                            continue;
                        }
                        $temp += $sg->criteriaLevel->point;
                    }
                    $maxPoint += $criteria->max_point;
                }
                $cpmk->push(['point' => $temp, 'maxPoint' => $maxPoint]);
            }
            $dataReturn->push(['name' => $name, 'nim' => $nim, 'cpmk' => $cpmk]);
        }

        $llo = LessonLearningOutcome::all();
        return view('class-portofolio.student', [
            'cc' => $courseClass,
            'llo' => $llo,
            'userData' => $dataReturn,
        ]);
    }
}
