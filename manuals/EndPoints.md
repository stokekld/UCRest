# EndPoints


### Tipo usuario

| Endpoint | Método | Usuarios | Descripción |
|:--------:|:------:|:--------:|:-----------:|
| /tipousuario | GET | Todos | Se obtendrán todos los tipos de usuario |
| /tipousuario/\{id\} | GET | Todos | Se obtendrá el tipo de usuario con el id \{id\} |
| /tipousuario | POST | Jefe | Se creará un tipo de usuario nuevo |
| /tipousuario/\{id\} | PUT | Jefe | Se modificará el tipo de usuario con el id \{id\} |
| /tipousuario/\{id\} | DELETE | Jefe | Se eliminará un tipo de usuario con el id \{id\} |

### Usuario

| Endpoint | Método | Usuarios | Descripción |
|:--------:|:------:|:--------:|:-----------:|
| /usuario | GET | Todos | Se obtendrán todos los usuarios |
| /subordinados | GET | Todos | Se obtendrán los usuarios subordinados al usuario solicitante |
| /usuario/\{id\} | GET | Todos | Se obtendrá el usuario con el id \{id\} |
| /usuario | POST | Jefe | Se creará un usuario |
| /usuario/\{id\} | PUT | Jefe | Se modificará el usuario con el id \{id\} |
| /usuario/\{id\} | DELETE | Jefe | Se eliminará el usuario con el id \{id\} |
| /usuario/\{id\}/activar | PUT | Jefe | Se activará el usuario con el id \{id\} |
| /usuario/\{id\}/desactivar | PUT | Jefe | Se desactivará el usuario con el id \{id\} |

### Solicitante

| Endpoint | Método | Usuarios | Descripción |
|:--------:|:------:|:--------:|:-----------:|
| /solicitante | GET | Todos | Se obtendrán todos los solicitantes |
| /solicitante/\{id\} | GET | Todos | Se obtendrá el solicitante con el id \{id\} |

### Tipo actividad

| Endpoint | Método | Usuarios | Descripción |
|:--------:|:------:|:--------:|:-----------:|
| /tipoactividad | GET | Todos | Se obtendrán todos los tipos de actividad |
| /tipoactividad/\{id\} | GET | Todos | Se obtendrá el tipo de actividad con el id \{id\} |
| /tipoactividad | POST | Jefe | Se creará un tipo de actividad |
| /tipoactividad/\{id\} | PUT | Jefe | Se modificará el tipo de actividad con el id \{id\} |
| /tipoactividad/\{id\} | DELETE | Jefe | Se eliminará el tipo de actividad con el id \{id\} |

### Hashtag

| Endpoint | Método | Usuarios | Descripción |
|:--------:|:------:|:--------:|:-----------:|
| /hastag | GET | Todos | Se obtendrán todos los hashtags |
| /hastag/\{id\} | GET | Todos | Se obtendrá el hashtag con el id \{id\} |
| /hastag | POST | Jefe | Se creará un hashtag |
| /hastag/\{id\} | PUT | Jefe | Se modificará el hashtag con el id \{id\} |
| /hastag/\{id\} | DELETE | Jefe | Se eliminará el hashtag con el id \{id\} |

### Soporte (*sin completar*)

> Nota: El jefe obtendrá todos los soportes sin completar y realizará las siguientes operaciones sin restricción.

| Endpoint | Método | Usuarios | Descripción | Observación |
|:--------:|:------:|:--------:|:-----------:|:-----------:|
| /soporte | GET | Todos | Se obtendrán todos los soportes | Los soportes obtenidos serán los creados y vinculados al usuario solicitante además de los soportes marcados como compartidos |
| /soporte/\{id\} | GET | Todos | Se obtendrá el soporte con el id \{id\} | Se obtendrá el soporte solo si esta creado o está vinculado de cualquier manera al usuario solicitante o es un soporte compartido |
| /soporte | POST | Todos | Se creará un soporte |  |
| /soporte/\{id\} | PUT | Todos | Se modificará el soporte con el id \{id\} | Se modificará el soporte solo si fue creado por el usuario solicitante |
| /soporte/\{id\} | DELETE | Todos | Se eliminará el soporte con el id \{id\} | Se eliminará el soporte solo si fue creado por el usuario solicitante |
| /soporte/\{id\}/usuario/\{id\}/asignar | POST | Todos | Se asignará el soporte con el id \{id\} a el usuario con el id \{id\}  | El usuario solicitante asignará el soporte a el usuario solo si el soporte fue creado por él y el usuario es su subordinado |
| /soporte/\{id\}/usuario/\{id\}/desasignar | DELETE | Todos | Se desasignará el soporte con el id \{id\} a el usuario con el id \{id\}  | El usuario solicitante desasignará el soporte a el usuario solo si el soporte fue creado por él y él asignó a el usuario |
| /soporte/\{id\}/vincular | POST | Todos | Se vinculará a si mismo al soporte con el id \{id\} | El usuario solicitante se vinculará al soporte solo si este es compartido |
| /soporte/\{id\}/usuario/\{id\}/compartir | POST | Todos | Se compartirá el soporte con el id \{id\} a el usuario con el id \{id\}  | El usuario solicitante compartirá el soporte a el usuario solo si el soporte fue creado por él |
| /soporte/\{id\}/desvincular | DELETE | Todos | Se desvinculará a si mismo del soporte con el id \{id\} | El usuario solicitante se desvinculará del soporte solo si él fue quien se vinculó |
| /soporte/\{id\}/usuario/\{id\}/nocompartir | DELETE | Todos | Se quitará a el usuario con el id \{id\} del soporte con el id \{id\} | El usuario solicitante quitará a el usuario con el soporte solo si el usuario solicitante fue quien se lo compartió |
| /soporte/\{id\}/usuario/\{id\}/supervisor | PUT | Todos | Se colocará como supervisor a el usuario con el id \{id\} en el soporte con el id \{id\} | El usuario solicitante colocará a el usuario como supervisor solo si es su subordinado y el usuario esta asignado al soporte |
| /soporte/\{id\}/compartido | PUT | Todos | Se colocorá como compartido el soporte con el id \{id\} | Se colocorá como compartido solo si el soporte fue credo por el usuario solicitante |
| /soporte/\{id\}/completado | PUT | Todos | Se colocará como completado el soporte con el id \{id\} | Se colocará como completado solo si el soporte fue creado o está vinculado al usuario solicitante |

### Soporte (completados)

| Endpoint | Método | Usuarios | Descripción | Observación |
|:--------:|:------:|:--------:|:-----------:|:-----------:|
| /soporte/\{id\}/nocompletado | PUT | Jefe | Se colocará como no completado el soporte con el id \{id\} | Se colocará como no completado solo si el soporte fue completado |
| /historial/soporte | GET | Todos | Se obtendrán los soportes completados mediante alguna busqueda | |

### Actividad

| Endpoint | Método | Usuarios | Descripción | Observación |
|:--------:|:------:|:--------:|:-----------:|:-----------:|
| /soporte/\{id\}/actividad | GET | Todos | Se obtendrán todas las actividades correspondientes al soporte con el id \{id\} | Se obtendrán las actividades solo si el soporte fue creado o esta vinculado al usuario solicitante |
| /soporte/\{id\}/actividad/\{id\} | GET | Todos | Se obtendrá la actividad con el id \{id\} correspondiente al soporte con el id \{id\} | Se obtendrá la actividad solo si el soporte fue creado o esta vinculado al usuario solicitante |
| /soporte/\{id\}/actividad | POST | Todos | Se creará la actividad correspondiente al soporte con el id \{id\} | Se creara la actividad solo si el soporte fue creado o esta vinculado al usuario solicitante |
| /soporte/\{id\}/actividad/\{id\} | PUT | Todos | Se modificará la actividad con el id \{id\} correspondiente al soporte con el id \{id\} | Se modificara la actividad solo si el usuario solicitante fue el creador |
| /soporte/\{id\}/actividad/\{id\} | DELETE | Todos | Se eliminará la actividad con el id \{id\} correspondiente al soporte con el id \{id\} | Se eliminara la actividad solo si el usuario solicitante fue el creador |
| /soporte/\{id\}/actividad/\{id\}/usuario/\{id\}/vincular | POST | Todos | Se vinculará a el usuario con el id \{id\} a la actividad con el id \{id\} del soporte con el id \{id\} | Se vinculará a el usuario solo si el usuario solicitante es el creador de la actividad |
| /soporte/\{id\}/actividad/\{id\}/usuario/\{id\}/desvincular | DELETE | Todos | Se desvinculará a el usuario con el id \{id\} de la actividad con el id \{id\} del soporte con el id \{id\} | Se desvinculará a el usuario solo si el usuario solicitante es el creador de la actividad |