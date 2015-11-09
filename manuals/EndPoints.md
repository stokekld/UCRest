# EndPoints


### Tipo usuario

| Endpoint | Método | Usuarios | Descripción |
|:--------:|:------:|:--------:|:-----------:|
| /tipousuario | GET | Todos | Se obtendrán todos los tipos de usuario |
| /tipousuario/\{id\} | GET | Todos | Se obtendrá el tipo de usuario con el id \{id\} |
| /tipousuario | POST | 1 | Se creará un tipo de usuario nuevo |
| /tipousuario/\{id\} | PUT | 1 | Se modificará el tipo de usuario con el id \{id\} |
| /tipousuario/\{id\} | DELETE | 1 | Se eliminará un tipo de usuario con el id \{id\} |

### Usuario

| Endpoint | Método | Usuarios | Descripción |
|:--------:|:------:|:--------:|:-----------:|
| /usuario | GET | Todos | Se obtendrán todos los usuarios |
| /usuario/\{id\} | GET | Todos | Se obtendrá el usuario con el id \{id\} |
| /usuario | POST | 1 | Se creará un usuario |
| /usuario/\{id\} | PUT | 1 | Se modificará el usuario con el id \{id\} |
| /usuario/\{id\} | DELETE | 1 | Se eliminará el usuario con el id \{id\} |
| /usuario/\{id\}/activar | PUT | 1 | Se activará el usuario con el id \{id\} |
| /usuario/\{id\}/desactivar | PUT | 1 | Se desactivará el usuario con el id \{id\} |

### Solicitante

| Endpoint | Método | Usuarios | Descripción |
|:--------:|:------:|:--------:|:-----------:|
| /solicitante | GET | Todos | Se obtendrán todos los solicitantes |
| /solicitante/\{id\} | GET | Todos | Se obtendrá el solicitante con el id \{id\} |
| /solicitante | POST | 1 | Se creará un solicitante |
| /solicitante/\{id\} | PUT | 1 | Se modificará el solicitante con el id \{id\} |
| /solicitante/\{id\} | DELETE | 1 | Se eliminará el solicitante con el id \{id\} |

### Tipo actividad

| Endpoint | Método | Usuarios | Descripción |
|:--------:|:------:|:--------:|:-----------:|
| /tipoactividad | GET | Todos | Se obtendrán todos los tipos de actividad |
| /tipoactividad/\{id\} | GET | Todos | Se obtendrá el tipo de actividad con el id \{id\} |
| /tipoactividad | POST | 1 | Se creará un tipo de actividad |
| /tipoactividad/\{id\} | PUT | 1 | Se modificará el tipo de actividad con el id \{id\} |
| /tipoactividad/\{id\} | DELETE | 1 | Se eliminará el tipo de actividad con el id \{id\} |

### Hashtag

| Endpoint | Método | Usuarios | Descripción |
|:--------:|:------:|:--------:|:-----------:|
| /hastag | GET | Todos | Se obtendrán todos los hashtags |
| /hastag/\{id\} | GET | Todos | Se obtendrá el hashtag con el id \{id\} |
| /hastag | POST | 1 | Se creará un hashtag |
| /hastag/\{id\} | PUT | 1 | Se modificará el hashtag con el id \{id\} |
| /hastag/\{id\} | DELETE | 1 | Se eliminará el hashtag con el id \{id\} |

### Soporte (*sin completar*)

| Endpoint | Método | Usuarios | Descripción | Observación |
|:--------:|:------:|:--------:|:-----------:|:-----------:|
| /soporte | GET | Todos | Se obtendrán todos los soportes | Los soportes obtenidos serán los creados y vinculados al usuario solicitante además de los soportes marcados como compartidos |
| /soporte/\{id\} | GET | Todos | Se obtendrá el soporte con el id \{id\} | Se obtendrá el soporte solo si esta creado o vinculado al usuario solicitante o es un soporte compartido |
| /soporte | POST | Todos | Se creará un soporte |  |
| /soporte/\{id\} | PUT | Todos | Se modificará el soporte con el id \{id\} | Se modificará el soporte solo si fue creado por el usuario solicitante |
| /soporte/\{id\} | DELETE | Todos | Se eliminará el soporte con el id \{id\} | Se eliminará el soporte solo si fue creado por el usuario solicitante |
| /soporte/\{id\}/vincular | POST | Todos | Se vinculará a si mismo al soporte con el id \{id\} | El usuario solicitante se vinculará al soporte solo si este es compartido |
| /soporte/\{id\}/usuario/\{id\}/vincular | POST | Todos | Se vinculará a el usuario con el id \{id\} al soporte con el id \{id\} | El usuario solicitante vinculará a el usuario con el soporte solo si el usuario es su subordinado y el soporte es compartido |
| /soporte/\{id\}/desvincular | DELETE | Todos | Se desvinculará a si mismo del soporte con el id \{id\} | El usuario solicitante se desvinculará del soporte solo si no fue vinculado por un superior |
| /soporte/\{id\}/usuario/\{id\}/desvincular | DELETE | Todos | Se desvinculará a el usuario con el id \{id\} del soporte con el id \{id\} | El usuario solicitante desvinculará a el usuario con el soporte solo si el usuario solicitante fue quien lo vinculo |
| /soporte/\{id\}/usuario/\{id\}/supervisor | PUT | Todos | Se colocará como supervisor a el usuario con el id \{id\} en el soporte con el id \{id\} | El usuario solicitante colocará a el usuario como supervisor solo si es su subordinado y el usuario esta vinculado al soporte |
| /soporte/\{id\}/compartido | PUT | Todos | Se colocorá como compartido el soporte con el id \{id\} | Se colocorá como compartido solo si el soporte fue credo por el usuario solicitante |
| /soporte/\{id\}/completado | PUT | Todos | Se colocará como completado el soporte con el id \{id\} | Se colocará como completado solo si el soporte fue creado o está vinculado al usuario solicitante |

### Soporte (completados)

| Endpoint | Método | Usuarios | Descripción | Observación |
|:--------:|:------:|:--------:|:-----------:|:-----------:|
| /soporte/\{id\}/nocompletado | PUT | 1 | Se colocará como no completado el soporte con el id \{id\} | Se colocará como no completado solo si el soporte fue completado |
| /historial/soporte | GET | Todos | Se obtendrán los soportes completados mediante alguna busqueda | |

### Actividad

| Endpoint | Método | Usuarios | Descripción | Observación |
|:--------:|:------:|:--------:|:-----------:|:-----------:|
| /soporte/\{id\}/actividad | GET | Todos | Se obtendrán todas las actividades correspondientes al soporte con el id \{id\} | Se obtendrán las actividades solo si el soporte fue creado o esta vinculado al usuario solicitante |
| /soporte/\{id\}/actividad/\{id\} | GET | Todos | Se obtendrá la actividad con el id \{id\} correspondiente al soporte con el id \{id\} | Se obtendrá la actividad solo si el soporte fue creado o esta vinculado al usuario solicitante |
| /soporte/\{id\}/actividad | POST | Todos | Se creará la actividad correspondiente al soporte con el id \{id\} | Se creara la actividad solo si el soporte fue creado o esta vinculado al usuario solicitante |
| /soporte/\{id\}/actividad/\{id\} | PUT | Todos | Se modificará la actividad con el id \{id\} correspondiente al soporte con el id \{id\} | Se modificara la actividad solo si el usuario solicitante fue el creador |
| /soporte/\{id\}/actividad/\{id\} | DELETE | Todos | Se eliminará la actividad con el id \{id\} correspondiente al soporte con el id \{id\} | Se eliminara la actividad solo si el usuario solicitante fue el creador |
| /soporte/\{id\}/actividad/\{id\}/usuario/\{id\}/vincular | POST | 
| /soporte/\{id\}/actividad/\{id\}/usuario/\{id\}/desvincular | 