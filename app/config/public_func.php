<?php
class commonBlock extends DController{
    public function __construct()
    {
        $data = array();
        parent::__construct();
        $categoryModel = $this->load->model('categoryModel');
        $postModel = $this->load->model('postModel');
        $table = 'tbl_category';
        $tablePost = 'tbl_category_post';
        $data['category'] = $categoryModel->categoryHome($table);
        $data['category_post'] = $postModel->categoryPostHome($tablePost);
        return $data;
    }
}
