<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MyLabels {

	var $Header = array(
		'title' => 'ACサイト'
	);

	var $LoginFormArray = array(
		'title' => 'ログイン'
	);

	var $MgrDtbThLabels = array(
		'username' => 'ユーザー',
		'status' => '状態',
		'car_info1' => '車両情報',
		'FENPEI' => '分配'
	);
//2009 10 27 song
	var $MgrDtbMisThLabels = array(
		'mission_id' => '伝票ID',
		'fenpei_id' => '管理者',
		'zhixing_id' => 'ドライバー',
		'mission_status' => '配送状態',
		/*'del_status' => '削除状態',
		'recv_date' => '受注日時',
		'fenpei_date' => '分配日時',
		'over_date' => '完了日時',*/
		'recv_date' => '御届日時',
		'fenpei_date' => '引取日時',
		'kakunin' => '配送依頼<br/>内容確認',
		'filename' => '配送依頼内容<br/>ダウンロード',
		'fileover' => '伝票',
		'siryo' => '資料',
		'deletemis' => '削除',
		'dtbconfirm' => '配送確認'
	);

	var $MgrDtbMisSelThLabes = array(
		'mission_id' => '伝票ID',
		'mission_status' => '配送状態',
		'recv_date' => '受注日時',
		'filename' => '配送依頼内容',
		'fenpei' => '分配'
	);

	var $MgrDtbThLabelsc = array(
		'username' => 'ユーザー',
		'status' => '状態',
		'car_info1' => '車両情報'
	);

	var $MgrDtbMisSelThLabesc = array(
		'mission_id' => '伝票ID',
		'mission_status' => '状態',
		'recv_date' => '受注日時',
		'filename' => '配送依頼内容'
	);

    var $UserRegFormLabels = array(
		'userregformtitle' => 'ユーザー新規',
		'user_id' => 'ユーザーID',
		'password' => 'パスワード',
		'passconf' => 'パスワード確認',
		'authority' => array('権限','管理者','カスタマー','顧客','パートナー','ドライバー'),
		'username' => '名前',
		'email' => 'メール',
		'user_phone3' => '電話番号１',
    	'user_phone4' => '電話番号１',
    	'user_phone5' => '電話番号１',
		'user_phone6' => '電話番号２',
    	'user_phone7' => '電話番号２',
    	'user_phone8' => '電話番号２',
		'user_info1' => '住所１',
		'user_info2' => '住所２',
		'car_info1' => '車両情報１',
		'car_info2' => '車両情報２',
    	'bangou' => '伝票番号(顧客用)'
	);

	var $OshiraseFormLabels = array(
		'title' => 'タイトル',
		'body' => '内容'
	);

    var $UserUpdateFormLabels = array(
		'userregformtitle' => '登録者情報更新',
		'id' => 'ID',
		'user_id' => 'ユーザーID',
		'password' => 'パスワード',
		'passconf' => 'パスワード確認',
		'authority' => array('権限','管理者','カスタマー','顧客','パートナー','ドライバー'),
		'username' => '名前',
		'email' => 'メール',
		'user_phone3' => '電話番号１',
    	'user_phone4' => '電話番号１',
    	'user_phone5' => '電話番号１',
		'user_phone6' => '電話番号２',
    	'user_phone7' => '電話番号２',
    	'user_phone8' => '電話番号２',
		'user_info1' => '住所１',
		'user_info2' => '住所２',
		'car_info1' => '車両情報１',
		'car_info2' => '車両情報２',
    	'bangou' => '伝票番号(顧客用)'
	);

    var $UserShowTableTh = array(
		'user_id' => 'ユーザーID',
		'password' => '状態',
		'authority' => '権限',
		'username' => '名前',
		'email' => 'メール',
		'user_phone1' => '電話番号',
		'user_info1' => '住所',
		'car_info1' => 'その他情報',
		/*'create_date' => '新規日時',
		'modify_date' => '修正日時',*/
		'update_button' => '更新',
		'delete_button' => '削除'
	);

	var $MgrMenu = array(
		'DLinfo' => 'ドライバー情報',
		'Mgrinfo' => '配送依頼内容',
		'Userinfo' => 'ユーザー情報'
	);


	//20091025 zhang
	var $CtmCreateMisForm = array(
		'title' => '新規配送依頼',
		'todoke_tel1' => '御届先電話番号',
		'todoke_tel2' => '御届先電話番号',
		'todoke_tel3' => '御届先電話番号',
		'todoke_add' => '御届先ご住所',
		'todoke_name' => '御届先お名前',
		'todoke_post' => '御届先郵便番号',
		//20091114 song
		'todoketime' => '御届日時',
		'ka_tel1' => '荷送人電話番号',
		'ka_tel2' => '荷送人電話番号',
		'ka_tel3' => '荷送人電話番号',
		'ka_add' => '荷送人ご住所',
		'ka_name' => '荷送人お名前',
		'ka_post' => '荷送人郵便番号',
		'id' => '伝票ID',
		//20091114 song
		'hiccyaku' => '引取日時',
		'hinmei' => '品名',
		'hoken' => '保険金額',
		'ka' => '荷姿',
		'ji' => '時',
		'fun' => '分',
		'siji' => '配送指示',
		'kosuu' => '個数',
		'jyuryo' => '容積重量',
		'bikou' => '備考',
		'tokki' => '特記事項',
		'ka1' => '封筒',
		'ka2' => 'ﾀﾞﾝﾎﾞｰﾙ',
		'ka3' => '布ﾊﾞｯｸﾞ',
		'ka4' => 'ｼﾞｭﾗﾙﾐﾝ',
		'ka_sonota' => '',
		'siji1' => '配達',
		'siji2' => '営業所止',
		'siji3' => '空港止',
		'siji4' => 'チャーター',
		'siji5' => '',
		'file' => '資料',
		'do' => 'の都道府県',
		'mati' => 'の町',
		'biru' => 'のビル'
	);
	var $CtmKakuninMisForm = array(
		'title' => '配送情報確認',
		'jyusyo' => 'ご住所',
		'onamae' => 'お名前',
		'pei' => '配達指示',
		'ka' => '荷            姿',
		'hinmei' => '品名：',
		'hoken' => '保険金額：',
		'kiji' => '記事欄',
		'kosuu' => '個        数',
		'jyuryo' => '容積重量',
		'ko' => '個',
		'kg' => 'KG',
		'sama' => '様',
		'denwa' => '電話：',
		'yubin' => '〒',
		'hiccyaku' => '必着',
		'biko' => '備考',
		'tokki' => '特記事項'
	);
	var $CtmConfirmMisForm = array(
		'title' => '任務完了',
		'jyusyo' => '任務新規を完成しました。'
	);

    var $CtmMisTh = array(
    	'mission_id' => '伝票ID',
    	'mission_status' => '配送状況',
    	'ka_name' => '荷送人お名前',
    	'ka_add' => '荷送人ご住所',
    	'ka_tel' => '荷送人<br/>お電話番号',
    	'todoke_name' => 'お届け先お名前',
    	'todoke_add' => 'お届け先ご住所',
    	'todoke_tel' => 'お届け先<br/>お電話番号',
    	'syousai' => '詳細',
    	'syusei' => '修正',
    	'kesi' => 'キャンセル'
    );

    //20091025 zhang

    var $DlMisTh =  array(
    	'mission_id' => '伝票ID',
    	//'mission_status' => '状態',
    	'fenpei_date' => '配車日時',
    	'over_date' => '完了日時',
    	'filename' => '配送依頼内容',
    	'fileover' => '伝票',
    	'siryo' => '資料',
    	'overbtn' => '配送状態'
    );
	//20091025 song modify

	var $SagyoTableTh = array(
		'year' => '年度',
		'month' => '月',
		'gosu' => '個数合計',
		'jyuuryou' => '重量合計',
		'kyori' => '距離合計',
		'kyori_kane' => '距離運賃',
		'futai_kane' => '付帯料金合計',
		'kousoku' => '高速料金合計',
		'cyusya_kane' => '駐車料金合計',
		'gokei' => '運賃合計',
		'meisai_button' => '詳細'
	);

	var $SagyoFormTableTh = array(
		'sagyoformtitle' => '作業新規',
		'sagyoUpformtitle' => '作業修正',
		'uke' => '受注先',
		'sagyo_id' => '伝票ID',
		'todoketime' => '御届日時',
		'hiccyaku' => '引取日時',
		'faxkara' => 'FAXから伝票ID',
		'todoke_tel1' => '御届先電話番号',
		'todoke_tel2' => '御届先電話番号',
		'todoke_tel3' => '御届先電話番号',
		'todoke_add' => '御届先ご住所',
		'todoke_name' => '御届先お名前',
		'todoke_post' => '御届先郵便番号',
		'sagyo_date' => '受付日時',
		'todoketime' => '御届日時',
		'niukejin' => '荷送人お名前',
		'jyusyo' => '荷送人ご住所',
		'ka_tel1' => '荷送人電話番号',
		'ka_tel2' => '荷送人電話番号',
		'ka_tel3' => '荷送人電話番号',
		'ka_post' => '荷送人郵便番号',
		'egyou' => '扱い営業所',
		'kwe_no' => 'ＫＷＥ原票Ｎｏ.',
		'kihon' => '基本料金',
		'jikan' => '時間',
		'ji' => '時',
		'fun' => '分',
		'gosu' => '個数',
		'jyuryo' => '重量',
		'kubun' => array('区分','D/L','P/U','作業','助手'),
		'kyori' => '距離',
		'kyori_kane' => '距離運賃',
		'futai_sagyo' => array('付帯作業','解梱','同時引取','残引','作業','その他'),
		'futai_kane' => '付帯料金',
		'kousoku' => '高速',
		'cyusya_kane' => '駐車料金',
		'gokei' => '運賃合計',
		'biko' => '備考',
		'sonota' => 'その他',
		'do' => 'の都道府県',
		'mati' => 'の町',
		'biru' => 'のビル'
	);

	//20091027 zhang
	var $SagyoMeisaiTableTh = array(
		'syusei' => '修正',
		'sakujyo' => '削除',
		'niukejin' => '荷 受 人',
		'egyou' => '扱い営業所',
		'jikan' => '時間',
		'gosu' => '個数',
		'kubun' => '区分',
		'kyori' => '距　　離',
		'futai_sagyo' => '付　帯　作　業',
		'kousoku' => '高　　速',
		'gokei' => '運賃合計',
		'biko' => '備　　考',
		'sitei' => '指定',
		'jyusyo' => '住　　所',
		'kwe_no' => 'ＫＷＥ原票Ｎｏ.',
		'jyuryo' => '重量',
		'kyori_kane' => '距離運賃',
		'futai_kane' => '付　帯　料　金',
		'cyusya_kane' => '駐車料金',
		'hicyaku' => '必着'
	);

	var $SeikyusyoTableTh = array(
		'hiduke' => '日時',
		'seikyu_kikan' => '請求対象日',
		'kaisya_mei' => '請求先会社名',
		'jyusyo' => '請求先住所',
		'kubun' => '請求金額',
		'donload' => 'ダウンロード',
		'sakujyo' => '削除'
	);

	var $SeikyusyoMeisaiTableTh = array(
		'hiduke' => '日時',
		'kubun' => '区分',
		'jisaki' => '集荷先',
		'peisaki' => '配達先',
		'kosuu' => '個数',
		'jyuryo' => '重量',
		'kyori' => '距離',
		'kihon_ryokin' => '基本料金',
		'kousoku_ryokin' => '高速料',
		'cyusya_ryokin' => '駐車料',
		'sonota_ryokin' => 'その他作業',
		'sagyo_ryokin' => '作業費',
		'gokei' => '小計',
		'bikou' => '備考'
	);

	var $SeikyusyoFormTableTh = array(
		'seikyusaki' => '請求先',
		'kikan' => '請求期間',
		'kingaku' => '請求金額',
		'kazei' => '課税対象額',
		'syohizei' => '消費税',
		'kosoku' => '非課税対象額（高速料）',
		'cyusya' => '非課税対象額（駐車料）',
		'siharau' => '支払方法',
		'furikomi' => '振込先',
		'furikomi_houhou' => array('振込'),
		'furikomi_saki' => array('○○銀行○○支店　口座番号xxxxxxxx','△△銀行△△支店　口座番号xxxxxxxx'),
		'gokei' => '明細合計'
	);

	var $SeikyusyoKakuninTableTh = array(
		'title' => '請求確認',
		'onaka' => '御中',
		'seikyukingaku' => '請求金額',
		'en' => '円',
		'nai' => '【内訳】',
		'kazei' => '課税対象額：',
		'kousoku' => '非課税対象額（高速料）：',
		'syouhizei' => '消費税：',
		'cyusya' => '非課税対象額（駐車料）：',
		'seikyukikan' => '請求期間：',
		'siharawu' => '御支払方法：',
		'furikomi' => '振込先：',
		'name' => '有限会社アカウントエクスプレス',
		'jyusyo' => '東京都港区港南３－４－８－３１５',
		'tel' => 'ＴＥＬ：03-5461-3855',
		'bikou1' => '＊毎々格別のご高配を賜り誠に有難うございます。',
		'bikou2' => '　右記の通り御請求申し上げます。',
		'gokei' => '明細合計'
	);

    var $dlmail = array(
    	'frommail' => 'acmailhost@gmail.com',
    	'fromname' => 'ドライバー',
    	'to' => 'acmailhost@gmail.com',
		'subject' => '仕事完了お知らせ',
		'message' => 'DL Testing the email class.'
    );

    var $mgrmail = array(
    	'frommail' => 'acmailhost@gmail.com',
    	'fromname' => '管理者',
    	'to' => 'acmailhost@gmail.com',
		'subject' => '配送依頼お知らせ',
		'message' => 'MGR Testing the email class.'
    );
    var $custommail = array(
    	'frommail' => 'acmailhost@gmail.com',
    	'fromname' => '顧客',
    	'to' => 'acmailhost@gmail.com',
		'subject' => '顧客依頼お知らせ',
		'message' => 'Custom Testing the email class.'
    );

    var $MissionShowForm = array(
		'title' => '任務明細',
		'jyusyo' => 'ご住所',
		'onamae' => 'お名前',
		'pei' => '配達指示',
		'ka' => '荷            姿',
		'hinmei' => '品名：',
		'hoken' => '保険金額：',
		'kiji' => '記事欄',
		'kosuu' => '個        数',
		'jyuryo' => '容積重量',
		'ko' => '個',
		'kg' => 'KG',
		'sama' => '様',
		'denwa' => '電話：',
		'yubin' => '〒',
		'hiccyaku' => '必着',
		'biko' => '備考',
        'nouhin' => '納　　品　　書',
    	'jyuryou' => '受　　領　　書',
    	'denpyoid' => '伝票ID',
    	'syukabi' => '出荷日',
    	'unti' => '運賃',
    	'suuryo' => '数　量',
    	'jl' => '重　量',
    	'hm' => '品　名',
    	'hz' => '荷　姿',
    	'tel' => 'TEL',
    	'in' => '受　領　印',
    	'jyoki' => '上記貨物確かに受領しました。',
    	'nengapi' => '年　　　月　　　日',
    	'jibun' => '時　　　分',
		'tokki' => '特記事項'
	);

	var $MgrMisTh = array(
		'user_id' => 'ユーザーID',
		'mission_id' => '伝票ID',
		'doraba' => 'ドライバー',
		'mission_status' => '状態',
		'ka_name' => '荷送人お名前',
    	'ka_add' => '荷送人ご住所',
    	//'ka_tel' => '荷送人',
    	'todoke_name' => '御届先お名前',
    	'todoke_add' => '御届先ご住所',
    	//'todoke_tel' => 'お届け先',
    	'update' => '更新日時',
    	'kakunin' => '確認',
		'syusei' => '修正'
    );

    var $MgrKaTh = array(
    	'ka_name' => '荷送人お名前',
    	'ka_tel' => '荷送人電話番号',
    	'ka_post' => '荷送人郵便番号',
    	'ka_add' => '荷送人ご住所',
    	'ka_kakutei' => '確定'
    );

    var $HyoTableTh = array(
    	'kubun' => '区分',
    	'simei' => '氏名',
    	'jyusyo' => '荷送人ご住所',
        'todoke_jyusho' => '御届先ご住所',
    	'todoke_hiduke' => '御届日時',
    	'hikitosi_hiduke' => '引取日時',
    	'hiduke2' => '完了日時'
    );

    var $CtmMitumoriTh = array(
    	'hiduke' => '日付',
    	'todoke_add' => '御届先ご住所',
    	'ka_add' => '荷送人ご住所',
    	'kingaku' => '金額',
    	'shousai' => '詳細',
    	'sakujyo' => '削除'
    );

	//タイトル
	var $userviewcrt = 'ユーザー新規';
	var $sagyo_tuika = '作業新規';
	var $seikyusyo = '請求書';
	var $seikyusyo_sakusei = '請求書作成';

	//Array
	var $mis_link = array('未配送','配送完了');
    var $missionshowth = array('取引先','お客様名前','お客様住所','お客様電話');

    var $kenArray = array('','北海道','青森県','岩手県','宮城県','秋田県','山形県','福島県','茨城県','栃木県','群馬県','埼玉県','千葉県','神奈川県','新潟県','富山県','石川県','福井県','山梨県','長野県','岐阜県','静岡県',
    					'愛知県','三重県','滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県','鳥取県','島根県','岡山県','広島県','山口県','徳島県','香川県','愛媛県','高知県','福岡県','佐賀県','長崎県','熊本県','東京都');
	//20091027 zhang
	var $sagyo_kubun = array('','D/L','P/U','作業','助手');
	var $sagyo_fudai = array('','解梱','同時引取','残引','作業','その他');
	//20091027 zhang
	var $authorityText = array('権限','管理者','カスタマー','顧客','パートナー','ドライバー');
	//20091114 song
	//var $statusText = array('未実行','実行中','完成','削除中','削除完成');
	var $statusText = array('未手配','手配済','配送完了','キャンセル中','キャンセル済');
	var $dlstatusText = array('未配車','実行中');
	var $fulikomi_houhou = array('振込');
	var $fulikomi_saki = array('○○銀行○○支店　口座番号xxxxxxxx','△△銀行△△支店　口座番号xxxxxxxx');
    //メッセージ
    var $sendmailerrmsg = 'Send mail faild';
    var $sendmailagain = 'Distribution again';
    var $deleteusermsg = 'このユーザーを削除します。よろしいですか。';
    var $err_ninmu = '任務を選択してください。';
	var $deletesagyomsg = 'この作業を削除します。よろしいですか。';
	var $deleteseikyusyomsg = 'この請求書を削除します。よろしいですか。';
	//2009 10 28 song
	var $deletemismsg = 'この作業を削除します。よろしいですか。';
	var $deletemitumorimsg = 'この見積を削除します。よろしいですか。';
	var $cancelmismsg = 'この作業を取消します。よろしいですか。';
	var $sonotacheck = 'その他が入力されません。';
	//end

	//2009 11 15 song
	/*顧客が配送依頼登録をした時点,管理者全員に送信する*/
	var $ctmCreatedMis = array(
    	'frommail' => '',
    	'fromname' => '顧客',
    	'to' => '',
		'subject' => '配送依頼　受注',
		'message' => 'を依頼しました。'//[ユーザID]が[伝票ID]を依頼しました。
    );
	/*顧客が配送依頼更新をした時点,管理者全員に送信する*/
	var $ctmUpdatedMis = array(
    	'frommail' => '',
    	'fromname' => '顧客',
    	'to' => '',
		'subject' => '配送依頼　更新',
		'message' => 'を更新しました。'//[ユーザID]が[伝票ID]を更新しました。
    );
	/*顧客が配送依頼キャンセルをした時点,管理者全員に送信する*/
	var $ctmCanceledMis = array(
    	'frommail' => '',
    	'fromname' => '顧客',
    	'to' => '',
		'subject' => '配送依頼　キャンセル',
		'message' => 'をキャンセルしました。'//[ユーザID]が[伝票ID]をキャンセルしました。
    );
	/*顧客が見積キャンセルをした時点,管理者全員に送信する*/
	var $ctmCanceledMori = array(
    	'frommail' => '',
    	'fromname' => '顧客',
    	'to' => '',
		'subject' => '見積　削除',
		'message' => 'を削除しました。'//[ユーザID]が[伝票ID]をキャンセルしました。
    );
	/*顧客が見積新規をした時点,管理者全員に送信する*/
	var $ctmMitumoriMis = array(
    	'frommail' => '',
    	'fromname' => '顧客',
    	'to' => '',
		'subject' => '見積新規',
		'message' => '見積を届きました。'//[ユーザID]が[伝票ID]をキャンセルしました。
    );
	/*ドライバが配送完了した時点,管理者全員に送信する*/
	var $dlMisOverM = array(
    	'frommail' => '',
    	'fromname' => 'ドライバ',
    	'to' => '',
		'subject' => '配送完了',
		'message' => 'の配送を完了しました。'//[ドライバID]が[伝票ID]の配送を完了しました。
    );
	/*ドライバが配送完了した時点,顧客に送信する*/
	var $dlMisOverC = array(
    	'frommail' => '',
    	'fromname' => 'ドライバ',
    	'to' => '',
		'subject' => '配送完了致しました',
		'message' => 'の配送を完了致しました。'//[伝票ID]の配送を完了致しました。
    );
	/*顧客が配送依頼登録をした時点,顧客に送信する*/
	var $mgrMisDistributedC = array(
    	'frommail' => '',
    	'fromname' => '管理者',
    	'to' => '',
		'subject' => '配送のご依頼受付致しました',
		'message' => 'のご依頼を受付致しました。只今、手配中です。'
		//[伝票ID]のご依頼を受付致しました。只今、手配中です。
    );
	/*管理者が配車をした時点,配車したドライバに送信する*/
	var $mgrMisDistributedD = array(
    	'frommail' => '',
    	'fromname' => '管理者',
    	'to' => '',
		'subject' => '配送依頼',
		'message' => 'を依頼しました。'
		//[ユーザID]が[伝票ID]を依頼しました。
    );
	/*顧客が配送依頼キャンセルをした時点,顧客に送信する*/
	var $mgrMisCanceling = array(
    	'frommail' => '',
    	'fromname' => '管理者',
    	'to' => '',
		'subject' => '配送のご依頼キャンセルを受付致しました',
		'message' => 'の配送ご依頼キャンセルを受付致しました。只今、確認中です。暫くお待ち下さい。'
		//[伝票ID]の配送ご依頼キャンセルを受付致しました。只今、確認中です。暫くお待ち下さい。
    );
	/*管理者が配送依頼取消をした時点,顧客に送信する*/
	var $mgrMisCanceled = array(
    	'frommail' => '',
    	'fromname' => '管理者',
    	'to' => '',
		'subject' => '配送のご依頼がキャンセルされました',
		'message' => 'の配送ご依頼は取消されました。'
		//[伝票ID]の配送ご依頼は取消されました。
    );
	/*管理者が配送依頼取消をした時点,顧客に送信する*/
	var $mgrMitumoriUpdate = array(
    	'frommail' => '',
    	'fromname' => '管理者',
    	'to' => '',
		'subject' => '見積返信',
		'message' => '見積を返信しました。'
		//[伝票ID]の配送ご依頼は取消されました。
    );
}

?>