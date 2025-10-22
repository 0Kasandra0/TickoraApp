
import data from "./municipios_por_departamento.json" with { type: "json" };

function obtenerDepartamentos() {
    console.log(Object.keys(data));
    console.log(data.Antioquia)
    return Object.keys(data);
}
 

// function municipiosPorDepartamento(departamento) {
//     return data[departamento] || [];
// }


console.log(data); // The imported JSON data as a JavaScript object