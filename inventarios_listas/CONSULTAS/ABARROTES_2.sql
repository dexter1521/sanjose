SELECT 
qry_reporte_precios.ID_PRODUCTO, 
qry_reporte_precios.CATEGORIA, 
qry_reporte_precios.NOMBRE_PRODUCTO, 
qry_reporte_precios.UNIDAD, 
qry_reporte_precios.EMPAQUE, 
qry_reporte_precios.OBSERVACIONES,
qry_reporte_precios.ULTIMO_PROVEEDOR

FROM 
qry_reporte_precios

WHERE 
(
qry_reporte_precios.CATEGORIA ="ACEITUNAS Y ALCAPARRAS" or
qry_reporte_precios.CATEGORIA ="ALCOHOL" or
qry_reporte_precios.CATEGORIA ="ALIMENTOS PARA ANIMALES" or
qry_reporte_precios.CATEGORIA ="BLANQUEADORES" or
qry_reporte_precios.CATEGORIA ="CAFE" or
qry_reporte_precios.CATEGORIA ="BOTANAS, DULCES Y FRITURAS" or
qry_reporte_precios.CATEGORIA ="CEBOLLITAS" or
qry_reporte_precios.CATEGORIA ="CEREALES" or
qry_reporte_precios.CATEGORIA ="CERILLOS" or
qry_reporte_precios.CATEGORIA ="COMBOS" or
qry_reporte_precios.CATEGORIA ="CONSERVAS Y ENLATADOS" or
qry_reporte_precios.CATEGORIA ="VERDURAS" or
qry_reporte_precios.CATEGORIA ="CHILES ENTEROS, PREPARADOS Y MOLIDOS" or
qry_reporte_precios.CATEGORIA ="CHOCOLATES" or
qry_reporte_precios.CATEGORIA ="DETERGENTES, JABONES Y SUAVIZANTES" or
qry_reporte_precios.CATEGORIA ="GALLETAS Y PANES" or
qry_reporte_precios.CATEGORIA ="HIGIENE PERSONAL" or
qry_reporte_precios.CATEGORIA ="LACTEOS" or
qry_reporte_precios.CATEGORIA ="MAYONESAS Y ADEREZOS" or
qry_reporte_precios.CATEGORIA ="PAÑALES Y TOALLITAS HUMEDAS" or
qry_reporte_precios.CATEGORIA ="QUESOS" or
qry_reporte_precios.CATEGORIA ="SALSAS" or
qry_reporte_precios.CATEGORIA ="SERVILLETAS Y SERVITOALLAS" or
qry_reporte_precios.CATEGORIA ="SHAMPOOS" or
qry_reporte_precios.CATEGORIA ="SOPAS Y PASTAS" or
qry_reporte_precios.CATEGORIA ="VASOS TERMICOS" or
qry_reporte_precios.CATEGORIA ="VELADORAS Y CIRIOS" or
qry_reporte_precios.CATEGORIA ="VINAGRES" or
qry_reporte_precios.CATEGORIA ="AZUCARES Y SALES" or
qry_reporte_precios.CATEGORIA ="HARINAS Y FECULAS" or
) 

and

(
ultimo_proveedor <> 'HERMANOS BRUNOS' and
ultimo_proveedor <> 'HERMANOS HILARIOS'  AND
ultimo_proveedor <> 'CAFE VICTORIA' and
ultimo_proveedor <> 'CHOCOLATE IDEAL' and
ultimo_proveedor <> 'CHAI' and
ultimo_proveedor <> 'CHILES SAN JOSE' and
ultimo_proveedor <> 'CHOCOLATE ARGÜELLO' and
ultimo_proveedor <> 'DON ROBERTO TENOCH' and
ultimo_proveedor <> 'MABEEL' and
ultimo_proveedor <> 'PRIMO MIGUEL' and
ultimo_proveedor <> 'SAYES'

)

ORDER BY 
qry_reporte_precios.CATEGORIA ASC, 
qry_reporte_precios.NOMBRE_PRODUCTO ASC
