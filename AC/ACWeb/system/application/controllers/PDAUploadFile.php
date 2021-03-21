<?php
class PDAUploadFile extends Controller {

	function PDAUploadFile()
	{
		parent::Controller();
	}

	function index()
	{
		/*
		$this->load->library('upload');

		// 画像１のアップロード
		if(!empty($_FILES['uploadedfile']['name'])){

			//ファイルオプションの設定
			$config1['upload_path'] = $this->config->item('uploads');
			$config1['allowed_types'] = 'gif|jpg|png';
			$config1['file_name'] = $_FILES['uploadedfile']['name'];

			$this->upload->initialize($config1);

			//ファイルのアップロード、エラーが出れば、ログにエラーメッセージを出力
			if (!$this->upload->do_upload('gazou1'))
			{
				log_message('error', $this->upload->display_errors());
				log_message('error', "NG");
				echo "NG";
			}else{
				echo "OK";
				log_message('error', "OK");
			}
		}
		*/

		// Where the file is going to be placed
		$target_path = "uploads/";

		//Add the original filename to our target path.
		//Result is "uploads/filename.extension"
		$target_path = $target_path . basename( $_FILES['uploadedfile']['name'].".jpeg");

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