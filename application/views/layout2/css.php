<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
	rel="stylesheet">

<!-- Css Styles -->
<link rel="stylesheet" href="<?=base_url('userr/')?>css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="<?=base_url('userr/')?>css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="<?=base_url('userr/')?>css/elegant-icons.css" type="text/css">
<link rel="stylesheet" href="<?=base_url('userr/')?>css/magnific-popup.css" type="text/css">
<link rel="stylesheet" href="<?=base_url('userr/')?>css/nice-select.css" type="text/css">
<link rel="stylesheet" href="<?=base_url('userr/')?>css/owl.carousel.min.css" type="text/css">
<link rel="stylesheet" href="<?=base_url('userr/')?>css/slicknav.min.css" type="text/css">
<link rel="stylesheet" href="<?=base_url('userr/')?>css/style.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
	.nav-tabs .nav-item {
		margin-bottom: 8px;
	}

	.nav-tabs .nav-link {
		padding: 0;
		border: none;
		display: block;
		text-align: center;
		transition: transform 0.3s ease;
	}

	/* Hover effect for the thumbnail images */
	.nav-tabs .nav-link:hover .product__thumb__pic {
		transform: scale(1.1);
		/* Slightly enlarge thumbnail on hover */
	}

	.product__thumb__pic {
		width: 70px;
		height: 70px;
		background-size: cover;
		background-position: center;
		border-radius: 4px;
		transition: transform 0.3s ease;
		/* Smooth zoom on hover */
	}

	/* Hover effect for the large product image */
	.product__details__pic__item img {
		transition: transform 0.3s ease;
		/* Smooth zoom on hover */
	}

	.product__details__pic__item img:hover {
		transform: scale(1.05);
		/* Slightly enlarge large image on hover */
	}


	/* From Uiverse.io by Li-Deheng */
	#btn-message {
		--text-color: #000;
		--bg-color-sup: #d2d2d2;
		--bg-color: #f4f4f4;
		--bg-hover-color: #ffffff;
		--online-status: #00da00;
		--font-size: 14px;
		--btn-transition: all 0.15s ease-out;
	}

	.button-message {
		display: flex;
		justify-content: center;
		align-items: center;
		font: 400 var(--font-size) Helvetica Neue, sans-serif;
		box-shadow: 0 0 2px rgba(0, 0, 0, .04), 0 1.5px 5px rgba(0, 0, 0, .06), 0 3px 12px rgba(0, 0, 0, .09), 0 20px 40px rgba(0, 0, 0, .12);
		background-color: var(--bg-color);
		border-radius: 50px;
		cursor: pointer;
		padding: 4px 8px 4px 4px;
		width: fit-content;
		height: 36px;
		border: 0;
		overflow: hidden;
		position: relative;
		transition: var(--btn-transition);
	}

	.button-message:hover {
		height: 50px;
		padding: 6px 16px 6px 6px;
		background-color: var(--bg-hover-color);
		transition: var(--btn-transition);
	}

	.button-message:active {
		transform: scale(0.98);
	}

	.content-avatar {
		width: 26px;
		height: 26px;
		margin: 0;
		transition: var(--btn-transition);
		position: relative;
	}

	.button-message:hover .content-avatar {
		width: 34px;
		height: 34px;
	}

	.avatar {
		width: 100%;
		height: 100%;
		border-radius: 50%;
		overflow: hidden;
		background-color: var(--bg-color-sup);
	}

	.user-img {
		width: 100%;
		height: 100%;
		object-fit: cover;
	}

	.status-user {
		position: absolute;
		width: 5px;
		height: 5px;
		right: 1px;
		bottom: 1px;
		border-radius: 50%;
		outline: solid 1.5px var(--bg-color);
		background-color: var(--online-status);
		transition: var(--btn-transition);
		animation: active-status 2s ease-in-out infinite;
	}

	.button-message:hover .status-user {
		width: 8px;
		height: 8px;
		outline: solid 2px var(--bg-hover-color);
	}

	.notice-content {
		display: flex;
		flex-direction: column;
		align-items: flex-start;
		justify-content: center;
		padding-left: 6px;
		text-align: initial;
		color: var(--text-color);
	}

	.username {
		letter-spacing: -5px;
		height: 0;
		opacity: 0;
		transform: translateY(-16px);
		transition: var(--btn-transition);
	}

	.user-id {
		font-size: 11px;
		letter-spacing: -5px;
		height: 0;
		opacity: 0;
		transform: translateY(8px);
		transition: var(--btn-transition);
	}

	.lable-message {
		display: flex;
		align-items: center;
		opacity: 1;
		transform: scaleY(1);
		transition: var(--btn-transition);
	}

	.button-message:hover .username {
		height: auto;
		letter-spacing: normal;
		opacity: 1;
		transform: translateY(0);
		transition: var(--btn-transition);
	}

	.button-message:hover .user-id {
		height: auto;
		letter-spacing: normal;
		opacity: 1;
		transform: translateY(0);
		transition: var(--btn-transition);
	}

	.button-message:hover .lable-message {
		height: 0;
		transform: scaleY(0);
		transition: var(--btn-transition);
	}

	.lable-message,
	.username {
		font-weight: 600;
	}

	.number-message {
		display: flex;
		justify-content: center;
		align-items: center;
		text-align: center;
		margin-left: 6px;
		font-size: 11px;
		width: 14px;
		height: 14px;
		background-color: var(--bg-color-sup);
		border-radius: 20px;
	}

	/*==============================================*/
	@keyframes active-status {
		0% {
			background-color: var(--online-status);
		}

		33.33% {
			background-color: #93e200;
		}

		66.33% {
			background-color: #93e200;
		}

		100% {
			background-color: var(--online-status);
		}
	}
	.badges {
		padding: 5px 10px;
		border-radius: 5px;
		color: white;
		font-weight: bold;
		text-align: center;
	}

	.bg-red {
		background-color: #f44336;
		/* Red for 'Pesanan Masuk' */
	}

	.bg-blue {
		background-color: #2196f3;
		/* Blue for 'Pesanan Dikonfirmasi' */
	}

	.bg-yellow {
		background-color: #ffeb3b;
		/* Yellow for 'Pesanan Dikemas' */
	}

	.bg-orange {
		background-color: #ff9800;
		/* Orange for 'Pesanan Dikirim' */
	}

	.bg-purple {
		background-color: #9c27b0;
		/* Purple for 'Pesanan Dalam Perjalanan' */
	}

	.bg-darkgreen {
		background-color: #388e3c;
		/* Dark green for 'Pesanan Selesai' */
	}
	
	

</style>
