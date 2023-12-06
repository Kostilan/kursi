<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(3);
        $categories = Category::all();
        // dd($courses);
        return view("index", 
        compact("courses", "categories")
    );
    }
    public function category_open($id)
    {
        $category = Category::findOrFail($id); //идет вызов категории по ид
        $courses = $category->course()->paginate(3); // Вызываю курсы по ид категории, обращаясь к методу модели
        //  Category где по названию данного метода идет отношение категорий с курсами
        return view("category_open", 
        compact("courses", "category")
    );
    }


    public function create_course(Request $request)
    {
        $request->validate([
            "title" => "required|max:50",
            "description" => "required",
            "cost" => "required|numeric",
            "duration" => "required|numeric",
            "category" => "required",
        ], [
            "title.required"=>"Поле обязательного заполнения",
            "description.required"=>"Поле обязательного заполнения",
            "cost.required"=>"Поле обязательного заполнения",
            "duration.required"=>"Поле обязательного заполнения",
            "category_id.required"=>"Поле обязательного заполнения",

            "title.max"=>"Имя должно содержать максимум 50 символов",
            "description.max"=>"Описание должно содержать максимум 50 символов",

            "cost.numeric"=>"Цена должна состоять из цифр",
            "duration.numeric"=>"Цена должна состоять из цифр",
        ]);

        $course_info = $request->all();
// dd($course_info);
        Course::create([
            "title"=> $course_info["title"],
            "description"=> $course_info["description"],
            "cost"=> $course_info["cost"],
            "duration"=> $course_info["duration"],
            // "image"=> $course_info["image"],
            "category_id"=> $course_info["category"],

        ]);

        return redirect("/admin");
    }

    public function create_categories(Request $request)
    {
        $request->validate([
            "title-course" => "required|max:50",
        ], [
            "title-course.required"=>"Поле обязательного заполнения",
            "title-course.max"=>"Имя должно содержать максимум 50 символов",
        ]);

        $category_info = $request->all();

        Category::create([
            "title"=> $category_info["title-course"],
        ]);

        return redirect("/admin");
    }
}
              