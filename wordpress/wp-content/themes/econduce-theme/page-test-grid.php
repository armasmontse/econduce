<?php get_header() ?>
<!--
.row//width100%//padding de los bordes//bgc si hay pleca
	.container//maxwidth: limite de la pagina
		.col// width, padd(medianil o gutter) divide el container
			.box//paddings pos relativa posiciona los elementos en dentro de
 -->
<div class="debug">

	<div class="grid__row">
		<h1 class="white">Modelo portada</h1>
		<div class="grid__container">
			<div class="grid__col-1-1--portada">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, expedita!
			</div>
		</div>
	</div>

	<div class="grid__row grid__row--no-padding">
		<h1 class="white">Modelo 3 cuadritos</h1>
		<div class="grid__container">
			<div class="grid__col-1-3">
				<div class="grid__box">
					<h1>.grid__col-1-3 .grid__box</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis vitae cumque expedita asperiores corporis iusto itaque doloremque, architecto, eum eius provident ad animi delectus ratione.</p>
				</div>
			</div>
			<div class="grid__col-1-3">
				<div class="grid__box">
					<h1>.grid__col-1-3 .grid__box</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis vitae cumque expedita asperiores corporis iusto itaque doloremque, architecto, eum eius provident ad animi delectus ratione.</p>
				</div>
			</div>
			<div class="grid__col-1-3">
				<div class="grid__box">
					<h1>.grid__col-1-3 .grid__box</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis vitae cumque expedita asperiores corporis iusto itaque doloremque, architecto, eum eius provident ad animi delectus ratione.</p>
				</div>
			</div>
		</div>
	</div>

	<div class="grid__row grid__row--no-padding">
		<h1 class="white">Modelo mapa</h1>
		<div class="grid__container grid__container--map">
			<div style="background-color: navy;" class="grid__box--location">
				<div style="border: 1px solid navy;"> ingresar ubicacion</div>
			</div>
			<div style="background-color: red; width: 100%; height: 68px;" class="grid__container--map--location-slider">
					Ubicaciones
			</div>
		</div>
	</div>

	<div class="grid__row grid__row--no-padding">
		<h1 class="white">Modelo 3 cuadritos en la seccion pasos</h1>
		<div class="grid__container">
			<div style="background-color: aliceblue;" class="grid__col-1-3">
				<div class="grid__box grid__box--steps">
					<h1>.grid__col-1-3 .grid__box</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis vitae cumque expedita asperiores corporis iusto itaque doloremque, architecto, eum eius provident ad animi delectus ratione.</p>
				</div>
			</div>
			<div style="background-color: aliceblue;" class="grid__col-1-3">
				<div class="grid__box grid__box--steps">
					<h1>.grid__col-1-3 .grid__box</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis vitae cumque expedita asperiores corporis iusto itaque doloremque, architecto, eum eius provident ad animi delectus ratione.</p>
				</div>
			</div>
			<div style="background-color: aliceblue;" class="grid__col-1-3">
				<div class="grid__box grid__box--steps">
					<h1>.grid__col-1-3 .grid__box</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis vitae cumque expedita asperiores corporis iusto itaque doloremque, architecto, eum eius provident ad animi delectus ratione.</p>
				</div>
			</div>
		</div>
	</div>

	<div class="grid__row grid__row--no-padding">
		<h1 class="white">Modelo 2 cuadritos</h1>
		<div class="grid__container">
			<div class="grid__col-1-2 grid__col--hide ">
				<div class="grid__box">
					<h1>.grid__col-1-2 .grid__box</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis vitae cumque expedita asperiores corporis iusto itaque doloremque, architecto, eum eius provident ad animi delectus ratione.</p>
				</div>
			</div>
			<div style="background-color: green;" class="grid__col-1-2 grid__col-1-2--width">
				<div  style="background-color: purple;" class="grid__box--prices-text">
					<h1>.grid__col-1-2 .grid__box</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis vitae cumque expedita asperiores corporis iusto itaque doloremque, architecto, eum eius provident ad animi delectus ratione.</p>
				</div>
				<div class="grid__row grid__row--no-padding">
					<div class="grid__container">
						<div class="grid__col-1-2">
							<div style="background-color: orange;" class="grid__box--prices-box grid__box--prices-box-title">
								<h3 style="text-align: center;">$10</h3>
							</div>
							<div style="background-color: beige;" class="grid__box--prices-box grid__box--prices-box-paragraph">
								<h3 style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae eius totam rem error ipsum quod deleniti culpa dicta dolorem alias ut excepturi magni, tempore, aspernatur voluptatibus delectus ducimus doloribus non.</h3>
							</div>
						</div>
						<div class="grid__col-1-2">
							<div style="background-color: orange;" class="grid__box--prices-box grid__box--prices-box-title">
								<h3 style="text-align: center;">$10</h3>
							</div>
							<div style="background-color: beige;" class="grid__box--prices-box grid__box--prices-box-paragraph">
								<h3 style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae eius totam rem error ipsum quod deleniti culpa dicta dolorem alias ut excepturi magni, tempore, aspernatur voluptatibus delectus ducimus doloribus non.</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="grid__row">
		<h1 class="white">Modelo emprendedores</h1>
		<div class="grid__container">
			<div style="background-color: blueviolet;" class="grid__box--emprendedores">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor totam, animi tempora commodi dignissimos ab sunt. Nobis dignissimos molestiae accusamus distinctio dolore ut aut doloribus. Beatae mollitia asperiores nulla illum.</p>
			</div>
			<div style="background-color: burlywood; width: 100%; height: 68px;" class="grid__container--emprendedores-slider">
				<h2>Slider</h2>
			</div>
		</div>
	</div>

	<div class="grid__row">
		<h1 class="white">Modelo video</h1>
		<div class="grid__container">
			<div style="background-color: burlywood; padding: 10px;" class="grid__container--video">
				<h2>Lorem</h2>
			</div>
		</div>
	</div>

	<div class="grid__row">
		<h1 class="white">Modelo contandor</h1>
		<div class="grid__container">
			<div class="grid__col-1-1">
				<div style='background-color: violet;' class="grid__box--contandor">
					<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus nisi officia et, velit quam eum consequatur quidem. Officia blanditiis voluptates maiores voluptate, laboriosam quibusdam, velit. Sed placeat, quae voluptatem voluptatum.</h3>
				</div>
			</div>
		</div>
	</div>

	<div class="grid__row">
		<div class="grid__container grid__container--footer">
			<div class="debug grid__col-1-3">
				<div class="grid__col-1-2">
					<div class="grid__box grid__box--footer">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed sunt, consectetur at molestiae sit temporibus repellat magni quibusdam aliquam ipsum nostrum asperiores? Iusto magni minus distinctio, ut similique nisi officiis?</p>
					</div>
				</div>
				<div class="grid__col-1-2">
					<div class="grid__box grid__box--footer">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed sunt, consectetur at molestiae sit temporibus repellat magni quibusdam aliquam ipsum nostrum asperiores? Iusto magni minus distinctio, ut similique nisi officiis?</p>
					</div>
				</div>
			</div>
			<div class="debug grid__col-1-3-irregular">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed sunt, consectetur at molestiae sit temporibus repellat magni quibusdam aliquam ipsum nostrum asperiores? Iusto magni minus distinctio, ut similique nisi officiis?</p>
			</div>
			<div class="debug grid__col-1-3-irregular">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed sunt, consectetur at molestiae sit temporibus repellat magni quibusdam aliquam ipsum nostrum asperiores? Iusto magni minus distinctio, ut similique nisi officiis?</p>
			</div>
		</div>
	</div>

	<div class="grid__row">
		<h1 class="white">Modelo footer</h1>
		<div class="grid__container grid__container--footer">
			<div class="grid__col-1-2--flex">
				<div class="grid__col-1-4">
					<div class="grid__box grid__box--footer">
						<h1>.grid__col-1-2 .grid__box</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis vitae cumque expedita asperiores corporis iusto itaque doloremque, architecto, eum eius provident ad animi delectus ratione.</p>
					</div>
				</div>
				<div class="grid__col-1-4">
					<div class="grid__box grid__box--footer">
						<h1>.grid__col-1-2 .grid__box</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis vitae cumque expedita asperiores corporis iusto itaque doloremque, architecto, eum eius provident ad animi delectus ratione.</p>
					</div>
				</div>
				<div class="grid__col-1-4">
					<div class="grid__box grid__box--footer">
						<h1>.grid__col-1-2 .grid__box</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis vitae cumque expedita asperiores corporis iusto itaque doloremque, architecto, eum eius provident ad animi delectus ratione.</p>
					</div>
				</div>
				<div class="grid__col-1-4">
					<div class="grid__box grid__box--footer">
						<h1>.grid__col-1-2 .grid__box</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis vitae cumque expedita asperiores corporis iusto itaque doloremque, architecto, eum eius provident ad animi delectus ratione.</p>
					</div>
				</div>
			</div>
			<div class="grid__col-1-2--static">
				<div class="grid__box">
					<h1>.grid__col-1-2--static .grid__box</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis vitae cumque expedita asperiores corporis iusto itaque doloremque, architecto, eum eius provident ad animi delectus ratione.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer() ?>
