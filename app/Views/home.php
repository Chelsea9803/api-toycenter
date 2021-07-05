<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('/css/main.css') ?>">
    <title>Api Rest CodeIgniter 4</title>
</head>

<body>

    <div class="container">
        <div class="LinkedBlock" id="tc_11023_08">
            <h2>Ejemplo RESTful API CodeIgniter 4</h2>
            <p>Por: Danisoft sas</p>

            <h3>Optener Todos los Productos (GET)</h3>
            <div class="code-toolbar">
                <pre
                    class="  language-bash"><code class="  language-bash">https://web.danisoft.com.co/public/products</code></pre>
                <div class="toolbar">
                    <div class="toolbar-item"><span>Bash</span></div>
                    <div class="toolbar-item"><button>Copy</button></div>
                </div>
            </div>
            <p><img loading="lazy" src="<?php echo base_url('/img/productall.png') ?>" alt="GET All Records"
                    width="1746" height="1292" class="alignnone size-full wp-image-11040"></p>
            <h3>Optener un Producto (GET)</h3>
            <div class="code-toolbar">
                <pre
                    class="  language-bash"><code class="  language-bash">https://web.danisoft.com.co/public/products/4</code></pre>
                <div class="toolbar">
                    <div class="toolbar-item"><span>Bash</span></div>
                    <div class="toolbar-item"><button>Copy</button></div>
                </div>
                <p><img loading="lazy" src="<?php echo base_url('/img/getproduct.png') ?>" alt="GET All Records"
                        width="1746" height="1292" class="alignnone size-full wp-image-11040"></p>
                <h3>Actualizar un Producto (PUT)</h3>
                <div class="code-toolbar">
                    <pre
                        class="  language-bash"><code class="  language-bash">https://web.danisoft.com.co/public/products/update/4</code></pre>
                    <div class="toolbar">
                        <div class="toolbar-item"><span>Bash</span></div>
                        <div class="toolbar-item"><button>Copy</button></div>
                    </div>
                </div>
                <p><img loading="lazy" src="<?php echo base_url('/img/updateProd.png') ?>" alt="GET All Records"
                        width="1746" height="1292" class="alignnone size-full wp-image-11040"></p>
                <h3>Crear un producto (POST)</h3>
                <div class="code-toolbar">
                    <pre
                        class="  language-bash"><code class="  language-bash">https://web.danisoft.com.co/public/products/add</code></pre>
                    <div class="toolbar">
                        <div class="toolbar-item"><span>Bash</span></div>
                        <div class="toolbar-item"><button>Copy</button></div>
                    </div>
                </div>
                <p><img loading="lazy" src="<?php echo base_url('/img/productAdd.png') ?>" alt="GET All Records"
                        width="1746" height="1292" class="alignnone size-full wp-image-11040"></p>
                <h3>Eliminar un Producto (DELETE)</h3>
                <div class="code-toolbar">
                    <pre
                        class="  language-bash"><code class="  language-bash">https://web.danisoft.com.co/public/products/delete/5</code></pre>
                    <div class="toolbar">
                        <div class="toolbar-item"><span>Bash</span></div>
                        <div class="toolbar-item"><button>Copy</button></div>
                    </div>
                </div>
                <p><img loading="lazy" src="<?php echo base_url('/img/deleteProd.png') ?>" alt="GET All Records"
                        width="1746" height="1292" class="alignnone size-full wp-image-11040"></p>

            </div>
        </div>
</body>

</html>