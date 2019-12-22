<?php

namespace App\Admin\Controllers;

use App\Enums\PicturePosition;
use App\Enums\Status;
use App\Models\Picture;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PictureController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '图片管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Picture);

        $grid->column('id', __('Id'));
        $grid->column('status', __('状态'))->using(Status::toSelectArray());
        $grid->column('file_path', __('图片'))->image();
        $grid->column('url_to', __('跳转'));
        $grid->column('content', __('附言'));
        $grid->column('position', __('位置'))->using(PicturePosition::toSelectArray());
        $grid->column('order', __('排序'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Picture::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('status', __('Status'));
        $show->field('file_path', __('File path'));
        $show->field('url_to', __('Url to'));
        $show->field('content', __('Content'));
        $show->field('position', __('Position'));
        $show->field('order', __('Order'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Picture);

        $form->switch('status', __('Status'))->default(1);
        $form->image('file_path', __('File path'))->uniqueName();
        $form->url('url_to', __('Url to'));
        $form->text('content', __('Content'));
        $form->select('position', __('Position'))->options(PicturePosition::toSelectArray());
        $form->number('order', __('Order'))->default(0);

        return $form;
    }
}
