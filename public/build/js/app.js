function iniciarApp(){console.log("Iniciando app..."),consultarApiCitas()}async function consultarApiCitas(){try{const t="/api/citas",e=await fetch(t),n=await e.json();console.log(n),mostrarCitas(n)}catch(t){console.log(t)}}function mostrarCitas(t){const e=document.querySelector("#tbody-citas");e.innerHTML="",t.forEach(t=>{const{id:n,estudiante:a,medico:d,programa:c,especialidad:i,fecha:o,hora:s,estado:l}=t,r=document.createElement("TR");r.classList.add("tr"),r.dataset.idCita=n;const m=document.createElement("TD");m.classList.add("td"),m.textContent=a.nombre;const p=document.createElement("TD");p.classList.add("td"),p.textContent=c.nombre;const C=document.createElement("TD");C.classList.add("td"),C.textContent=d.nombre;const u=document.createElement("TD");u.classList.add("td"),u.textContent=i.nombre;const h=document.createElement("TD");h.classList.add("td"),h.textContent=o;const E=document.createElement("TD");E.classList.add("td"),E.textContent=s;const L=document.createElement("TD");L.classList.add("td"),1==l?(L.classList.add("pendiente"),L.textContent="pendiente"):2==l?(L.classList.add("atendida"),L.textContent="atendida"):3==l&&(L.classList.add("cancelada"),L.textContent="cancelada");const T=document.createElement("TD");T.classList.add("td");const f=document.createElement("FORM");f.method="POST",f.action="/api/citas/eliminar";const x=document.createElement("INPUT");x.type="hidden",x.name="id",x.value=t.id;const D=document.createElement("BUTTON");D.textContent="Eliminar",D.classList.add("btn-eliminar"),D.type="submit",D.onclick=eliminarCita,r.appendChild(m),r.appendChild(p),r.appendChild(C),r.appendChild(u),r.appendChild(h),r.appendChild(E),r.appendChild(L),f.appendChild(x),f.appendChild(D),T.appendChild(f),r.appendChild(T),e.appendChild(r)})}function eliminarCita(t){t.preventDefault();const e=t.target.closest("button").closest("tr"),n=e.dataset.idCita;e.remove(),fetch("/api/citas/eliminar",{method:"POST",headers:{"Content-Type":"application/json"},body:JSON.stringify({id:n})}).then(t=>t.json()).then(t=>{t.success?console.log("Cita eliminada correctamente"):console.error("Error al eliminar la cita:",t.message)}).catch(t=>{console.error("Error al eliminar la cita:",t)})}document.addEventListener("DOMContentLoaded",(function(){iniciarApp()}));