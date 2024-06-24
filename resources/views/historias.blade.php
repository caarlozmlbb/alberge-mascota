<header>
    @include('cabecera')
    <section class="textos-header">
        <h1 id="header-text-2" style="font-size:50px;">Historias</h1>
    </section>
</header>

<section class="adoption-stories">
    <h1>Historias de Adopción</h1>
    <div class="story-card">
        <img src="images/ana.jpg" alt="Foto de Ana Pérez" class="story-image">
        <div class="story-content">
            <h2>Ana Pérez</h2>
            <p>Desde pequeña, Ana siempre soñó con tener una mascota. Un día, decidió visitar el albergue local y se enamoró instantáneamente de un perrito llamado Max. Max había sido rescatado de la calle y, a pesar de su difícil pasado, tenía una energía y alegría contagiosas.</p>
            <p>Ana decidió adoptarlo y, desde entonces, su vida cambió para mejor. Max no solo le brindó compañía, sino que también la motivó a llevar un estilo de vida más activo y saludable. Juntos disfrutan de largos paseos por el parque y momentos de juego en casa.</p>
            <p>La adopción de Max no solo trajo felicidad a la vida de Ana, sino que también le enseñó el valor del amor incondicional y la importancia de darle una segunda oportunidad a los animales necesitados. Ana anima a todos a considerar la adopción y experimentar la alegría que un nuevo amigo peludo puede traer a sus vidas.</p>
        </div>
    </div>
</section>

<style>
    /* styles.css */
    .adoption-stories {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

.story-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    border-bottom: 1px solid #eee;
    padding-bottom: 20px;
    margin-bottom: 20px;
}

.story-card:last-child {
    border-bottom: none;
    margin-bottom: 0;
}

.story-image {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 20px;
}

.story-content {
    max-width: 600px;
}

h2 {
    color: #555;
    margin: 0 0 10px;
}

p {
    color: #666;
    line-height: 1.6;
    margin: 10px 0;
}
</style>
