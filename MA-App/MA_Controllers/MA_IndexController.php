<?php
namespace MAAlMOSTAQBAL\MA_Controllers;
use MAAlMOSTAQBAL\MA_Models\MA_CategoryModel;
use MAAlMOSTAQBAL\MA_Models\MA_ProductModel;

/**
* 
*/
class MA_IndexController extends MA_AbstractController
{


	public function MA_Index_Action(){
	    $MA_Products = MA_ProductModel::MA_getAllWithLimit(6);
	    $MA_Category = MA_CategoryModel::MA_getAll();
	    $MA_Count_Product = MA_CategoryModel::MA_getWithRowCount();
	    $this->_MA_Data['MA_Count'] = $MA_Count_Product;
	    $this->_MA_Data['MA_CATEGORY'] = $MA_Category;
	    $this->_MA_Data['MA_PRODUCTS'] = $MA_Products;
        $this->_MA_View();
	}

}