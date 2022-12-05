<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseClass;

class ClassPortofolioController extends Controller
{
    public function index(CourseClass $courseClass)
    {
        //menghitung jumlah mahasiswa lulus dan tidak lulus
        $lulus = 0;
        $gagal = 0;
        $temp = 0;

        foreach ($courseClass->students as $student) {
            $temp = 0;
            foreach ($student->studentGrade as $sg) {
                $temp += $sg->criteriaLevel->point;
            }
            if ($temp > 50) {
                $lulus++;
            } else {
                $gagal++;
            }
        }

        //menghitung ketercapaian untuk seluruh sub cpmk
        //mendapatkan criteria sesuai llo
        $llo = LessonLearningOutcome::all();
        $criteriaCollection = collect();
        foreach ($llo as $llo) {
            foreach ($llo->criteria as $criteria) {
                $criteriaCollection->push($criteria);
            }
        }


        //mendapatkan criteriaLevel yang sesuai dengan class
        $criteriaLevelCollection = collect();
        foreach ($courseClass->students as $student) {
            foreach ($student->studentGrade as $sg) {
                $criteriaLevelCollection->push($sg->criteriaLevel);
            }
        }

        //mendapatkan total nilai untuk setiap sub cpmk
        $llo = LessonLearningOutcome::all();
        $llo_achieve = collect();
        $count = 0;
        foreach ($llo as $llo) {
            $count = 0;
            $maxPoint = 0;
            foreach ($criteriaCollection as $crit) {
                if ($crit->llo_id != $llo->id) {
                    continue;
                }
                foreach ($criteriaLevelCollection as $cl) {
                    if ($crit->id != $cl->criteria_id) {
                        continue;
                    }
                    $count += $cl->point;
                }
                $maxPoint += $crit->max_point;
            }
            $llo_achieve->push(['point' => $count, 'description' => $llo->description, 'maxPoint' => $maxPoint]);
        }

        return view('class-portofolio.index', [
            'cc' => $courseClass,
            'lulus' => $lulus,
            'gagal' => $gagal,
            'lloTotalPoint' => $llo_achieve,
            'studentSum' => $courseClass->students->count()
        ]);
    }

    public function student(CourseClass $courseClass)
    {
        return view('class-portofolio.student', [
            'cc' => $courseClass
        ]);
    }
}
