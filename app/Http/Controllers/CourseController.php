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
        // dd($courses);
        return view("index", 
        compact("courses")
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









// регистраиця, авторизация, личный кабинет представления
//  регитрация - форма для почта, пароль, подтверждение пароля, имя
//  авторизация - форма для пароль и почта
// информация о пользователе выводится, есть кнопочки для редактирования, при редактировании  с возможностями редактирования и выводидтся окошечка с информацией пользователя
// юзер конртоллер,  2 формы для авторизации и регистрации , 2 формы для валидации, праивла для валидации  как сейм - проверка на схожесть 2 полей пароля
// функционал не делаем
              