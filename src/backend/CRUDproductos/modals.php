<!-- Modal Crear Producto -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #e3f2fd;">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Agregar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
                    </div>
                    <div class="mb-3">
                        <label for="descuento" class="form-label">Descuento (%)</label>
                        <input type="number" step="0.01" class="form-control" id="descuento" name="descuento" required>
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen" required accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoría</label>
                        <select class="form-control" id="categoria" name="categoria" required>
                            <option value="">Selecciona una categoría</option>
                            <?php foreach ($categorias as $categoria) { ?>
                                <option value="<?php echo $categoria['id_categoria']; ?>"><?php echo $categoria['nombre_categoria']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="activo" class="form-label">Activo</label>
                        <input type="checkbox" id="activo" name="activo" value="on">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="create">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar Producto -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #e3f2fd;">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" id="edit-id" name="id">
                    <div class="mb-3">
                        <label for="edit-nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="edit-nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="edit-descripcion" name="descripcion" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit-precio" class="form-label">Precio >
                        <input type="number" step="0.01" class="form-control" id="edit-precio" name="precio" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-descuento" class="form-label">Descuento (%)</label>
                        <input type="number" step="0.01" class="form-control" id="edit-descuento" name="descuento" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-imagen" class="form-label">Imagen</label>
                        <input type="file" class="form-control" id="edit-imagen" name="imagen" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="edit-categoria" class="form-label">Categoría</label>
                        <select class="form-control" id="edit-categoria" name="categoria" required>
                            <option value="">Selecciona una categoría</option>
                            <?php foreach ($categorias as $categoria) { ?>
                                <option value="<?php echo $categoria['id_categoria']; ?>"><?php echo $categoria['nombre_categoria']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit-activo" class="form-label">Activo</label>
                        <input type="checkbox" id="edit-activo" name="activo">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="update">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Eliminar Producto -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #e3f2fd;">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Eliminar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" id="delete-id" name="id">
                <div class="modal-body">
                    ¿Estás seguro de que deseas eliminar este producto? Esta acción no se puede deshacer.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger" name="delete">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal de detalles -->
<div class="modal fade" id="detalleModal" tabindex="-1" aria-labelledby="detalleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detalleModalLabel">Detalles del producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Contenido del modal -->
                <div id="detalle-modal-body"></div>
            </div>
        </div>
    </div>
</div>