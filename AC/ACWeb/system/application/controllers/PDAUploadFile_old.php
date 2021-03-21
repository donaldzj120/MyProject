<?php
class PDAUploadFile extends Controller {

	function PDAUploadFile()
	{
		parent::Controller();
	}

	function index()
	{

		// Where the file is going to be placed
		$target_path = "uploads/";

		//Add the original filename to our target path.
		//Result is "uploads/filename.extension"
		$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);

		log_message('info', $target_path);
		log_message('info', $_FILES['uploadedfile']['tmp_name']);

		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
		    echo "OK";
		    log_message('info', "OK");
		} else{
		    echo "NG";
		    log_message('error', "NG");
		}



		/*
		//ファイルのアップロード
		$config['upload_path'] = './PDFSignFiles/';
		$config['allowed_types'] = 'jpg';
		$config['file_name'] = $_FILES['uploadedfile']['name'];

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload())
		{
			echo "NG";
		}else{
			echo "OK";
		}
		*/
	}
}