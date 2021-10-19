
<fieldset>
    <legend>Información General</legend>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="vendedor[nombre]" placeholder="Nombre Vendedor (a)" value="<?php echo sanitiza($vendedor->nombre); ?>">
    
    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="vendedor[apellido]" placeholder="Apellido" value="<?php echo sanitiza($vendedor->apellido); ?>">

    <label for="telefono">Teléfono:</label>
    <input type="tel" id="telefono" name="vendedor[telefono]" placeholder="Teléfono" value="<?php echo sanitiza($vendedor->telefono); ?>">
</fieldset>

 