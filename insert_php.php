<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">INGRESO DE PRODUCTOS</h3>
        </div>
        <div class="col-md-12">
            <form class="form-group" accept-charset="utf-8"
                action="save_products.php" enctype="multipart/form-data"
                method="post">
                <div class="form-group">
                    <br> <label class="control-label" for="producto">PRODUCTO</label> 
                    <input id="producto" name="producto" placeholder="PRODUCTO"
                        class="form-control" required="" type="text">
                </div>
                <div class="form-group">
                    <label class="control-label" for="precio">PRECIO</label> <input
                        id="precio" name="precio" placeholder="PRECIO"
                        class="form-control" required="" type="text">
                </div>
                <div class="form-group">
                    <label class="control-label" for="categoria">CATEGORIA DEL PRODUCTO</label>
                    <select id="categoria" name="categoria" class="form-control">
                    <!-- Las categorias seran cargadas de la db -->
                    
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="file">Seleccione la imagen a subir</label> 
                    <input type="file" id="imagen" class="form-control" name="imagen" size="30"/>
                </div>
                <br>
                <div class="text-center">
                    <input type="submit" class="btn btn-success" value="Añadir Producto" />
                </div>
            </form>
        </div>
    </div>
</div>
