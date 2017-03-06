<style type="text/css">
	.image-container{
		width: 100%;
		height: 100%;
		padding: 5px;
		position: relative;
		z-index: 12;
	}
	.image-container a{
		position: absolute;
		display: inline-block;
		vertical-align: top;
		zoom: 1; /* Fix for IE7 */
		*display: inline; /* Fix for IE7 */
		padding: 5px;
		height: 20px;
		bottom: 15px;
			}
	#image-ok{
		left: 5px;
	}
	#image-no{
		right: 15px;
	}
	#image-file{
		position: absolute;
		top: 33%;
		left: 5px;
		z-index: 13;
		opacity: 0;
		height: 32px;
		cursor: pointer;
	}
	.image-container label{
		z-index: 12;
		width: 90%;
		position: absolute;
		top: 33%;
		display: block;
		left: 10px;
		cursor:pointer;
	}
</style>
<div class="image-container">
<form name="form-image" id="form-image" method="post" enctype="multipart/form-data" action="core/upload.php">
<input name="gambar" id="image-file" type="file" /><label class="btn">Upload An Image</label>
</form>
</div>