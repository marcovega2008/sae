import { PeriodoLectivoService } from 'app/CRUD/periodolectivo/periodolectivo.service';
import { PeriodoLectivo } from './../../../entidades/CRUD/PeriodoLectivo';
import { Cupo } from './../../../entidades/CRUD/Cupo';
import { Estudiante } from './../../../entidades/CRUD/Estudiante';
import { LoginResult } from './../../../entidades/especifico/Login-Result';
import { Component, OnInit, ViewContainerRef } from '@angular/core';
import { ElementRef, Renderer2, ViewChild } from '@angular/core';
import { ToastsManager } from 'ng2-toastr/ng2-toastr';
import { Persona } from 'app/entidades/CRUD/Persona';
import { MatriculacionService } from 'app/layout/matriculacion/matriculacion.service';
import { DatosInstituto } from 'app/entidades/especifico/Datos-Instituto';
import { RolSecundario } from 'app/entidades/CRUD/RolSecundario';
import { Router } from '@angular/router';
import { DatosCupo } from 'app/entidades/especifico/Datos-Cupo';
import { TipoSangreService } from '../../../CRUD/tiposangre/tiposangre.service';
import { UbicacionService } from '../../../CRUD/ubicacion/ubicacion.service';
import { Carrera } from 'app/entidades/CRUD/Carrera';
import { CarreraService } from 'app/CRUD/carrera/carrera.service';
import { TipoIngresosService } from 'app/CRUD/tipoingresos/tipoingresos.service';
import * as jsPDF from 'jspdf';
import * as html2canvas from 'html2canvas';
import { EtniaService } from '../../../CRUD/etnia/etnia.service';
import { EstudianteService } from '../../../CRUD/estudiante/estudiante.service';
import { CupoService } from '../../../CRUD/cupo/cupo.service';
import { NivelCapacitacionContinuaService } from './../nivelcapacitacioncontinua/nivelcapacitacioncontinua.service';

@Component({
    selector: 'app-formulario-ingles',
    templateUrl: './formulario-ingles.component.html',
    styleUrls: ['./formulario-ingles.component.scss']
})
export class FormularioInglesComponent implements OnInit {
    @ViewChild('encabezadoFormularioIngles') encabezadoFormularioIngles: ElementRef;
    @ViewChild('cuerpoFormularioInglesPG1') cuerpoFormularioInglesPG1: ElementRef;
    @ViewChild('cuerpoFormularioInglesPG2') cuerpoFormularioInglesPG2: ElementRef;
    @ViewChild('pieFormularioInglesPG1') pieFormularioInglesPG1: ElementRef;
    @ViewChild('pieFormularioInglesPG2') pieFormularioInglesPG2: ElementRef;
    busy: Promise<any>;
    personaLogeada: Persona;
    estudiante: Estudiante;
    cupo: Cupo;
    rol: number;
    datosInstituto: DatosInstituto;
    logo: String;
    barcode: String;
    fechaActual: Date;
    tipoSangre: String;
    periodoLectivo: PeriodoLectivo;
    rolesSecundarios: RolSecundario[];
    datosCupo: DatosCupo;
    tipoIdentificacion: number;
    paisNacimiento: String;
    provinciaNacimiento: String;
    cantonNacimiento: String;
    paisDomicilio: String;
    ingresos: String;
    provinciaDomicilio: String;
    cantonDomicilio: String;
    carrera: Carrera;
    etniaEspecifica: String;
    nivel: String;

    constructor(public toastr: ToastsManager, vcr: ViewContainerRef,
        private matriculacionDataService: MatriculacionService,
        private tipoSangreDataService: TipoSangreService,
        private ubicacionDataService: UbicacionService,
        private carreraDataService: CarreraService,
        private periodoLectivoDataService: PeriodoLectivoService,
        private ingresosDataService: TipoIngresosService,
        private estudianteDataService: EstudianteService,
        private cupoDataService: CupoService,
        private router: Router,
        private nivelDataService: NivelCapacitacionContinuaService,
        private etniaDataService: EtniaService,
        private rd: Renderer2) {
            this.toastr.setRootViewContainerRef(vcr);
    }

    ngOnInit() {
        const logedResult = JSON.parse(localStorage.getItem('logedResult')) as LoginResult;
        this.personaLogeada = logedResult.persona;
        this.estudiante = new Estudiante();
        this.periodoLectivo = new PeriodoLectivo();
        this.cupo = new Cupo();
        this.carrera = new Carrera();
        this.datosInstituto = new DatosInstituto();
        this.fechaActual = new Date();
        this.datosCupo = new DatosCupo();
        this.rol = logedResult.idRol;
        this.rolesSecundarios = JSON.parse(localStorage.getItem('rolesSecundarios')) as RolSecundario[];
        let autorizado = false;
        this.rolesSecundarios.forEach(rol => {
            if ( rol.idRol == 2 || rol.idRol == 6 ) {
                autorizado = true;
            }
        });
        if ( this.rol == 2 || this.rol == 6 ) {
            autorizado = true;
        }
        if (!autorizado) {
            this.router.navigate(['/login']);
        }
        this.getDatosCupo(this.personaLogeada.id);
        this.tipoIdentificacion = 1
        if (this.personaLogeada.identificacion.length !== 10) {
            this.tipoIdentificacion = 2
        }
        this.getTipoSangre();
        this.getDatosNacimiento();
        this.getIngresos();
        this.getDatosResidencia();
        this.getEtnia();
        this.getEstudiante();
        this.getCupo();
        this.getNivel(1);
    }

    getNivel(idNivel: number): void {
        this.busy = this.nivelDataService.get(idNivel)
        .then(r => {
            this.nivel = r.descripcion;
        })
        .catch(e => {
            console.log(e);
        });
    }

    getEstudiante(): void {
        this.busy = this.estudianteDataService.getFiltrado('idPersona', 'coincide', this.personaLogeada.id.toString())
        .then(respuesta => {
            this.estudiante = respuesta[0];
        })
        .catch(error => {
            // Error
        });
    }

    getCupo(): void {
        this.busy = this.cupoDataService.getFiltrado('idPersona', 'coincide', this.personaLogeada.id.toString())
        .then(respuesta => {
            this.cupo = respuesta[0];
            this.getPeriodoLectivo();
        })
        .catch(error => {
            // Error
        });
    }

    getPeriodoLectivo(): void {
        this.busy = this.periodoLectivoDataService.get(this.cupo.idPeriodoLectivo)
        .then(respuesta => {
            this.periodoLectivo = respuesta;
        })
        .catch(error => {
            // Error
        });
    }

    getEtnia(): void {
        if(this.personaLogeada.idEtnia == 4 || this.personaLogeada.idEtnia == 29 || this.personaLogeada.idEtnia == 30 || this.personaLogeada.idEtnia == 5 || this.personaLogeada.idEtnia == 26 || this.personaLogeada.idEtnia == 27){
            return;
        }
        this.busy = this.etniaDataService
            .get(
                this.personaLogeada.idEtnia
            )
            .then(respuesta => {
                this.etniaEspecifica = respuesta.descripcion;
            })
            .catch(error => {});
    }

    getDatosNacimiento(): void {
        this.busy = this.ubicacionDataService
            .getFiltrado(
                'codigo',
                'coincide',
                this.personaLogeada.idUbicacionNacimientoPais.toString()
            )
            .then(respuesta => {
                this.paisNacimiento = respuesta[0].descripcion;
            })
            .catch(error => {});
        this.busy = this.ubicacionDataService
            .getFiltrado(
                'codigo',
                'coincide',
                this.personaLogeada.idUbicacionNacimientoProvincia.toString()
            )
            .then(respuesta => {
                this.provinciaNacimiento = respuesta[0].descripcion;
            })
            .catch(error => {});
        this.busy = this.ubicacionDataService
            .getFiltrado(
                'codigo',
                'coincide',
                this.personaLogeada.idUbicacionNacimientoCanton.toString()
            )
            .then(respuesta => {
                this.cantonNacimiento = respuesta[0].descripcion;
            })
            .catch(error => {});
    }

    getDatosResidencia(): void {
        this.busy = this.ubicacionDataService
            .getFiltrado(
                'codigo',
                'coincide',
                this.personaLogeada.idUbicacionDomicilioPais.toString()
            )
            .then(respuesta => {
                this.paisDomicilio = respuesta[0].descripcion;
            })
            .catch(error => {});
        this.busy = this.ubicacionDataService
            .getFiltrado(
                'codigo',
                'coincide',
                this.personaLogeada.idUbicacionDomicilioProvincia.toString()
            )
            .then(respuesta => {
                this.provinciaDomicilio = respuesta[0].descripcion;
            })
            .catch(error => {});
        this.busy = this.ubicacionDataService
            .getFiltrado(
                'codigo',
                'coincide',
                this.personaLogeada.idUbicacionDomicilioCanton.toString()
            )
            .then(respuesta => {
                this.cantonDomicilio = respuesta[0].descripcion;
            })
            .catch(error => {});
    }

    getTipoSangre(): void {
        this.busy = this.tipoSangreDataService
        .getFiltrado(
            'id',
            'coincide',
            this.personaLogeada.idTipoSangre.toString()
        )
        .then(respuesta => {
            this.tipoSangre = respuesta[0].descripcion;
        })
        .catch(error => {});
    }

    getDatosInstituto(idCarrera: number): void {
        this.busy = this.matriculacionDataService.getDatosInstituto(idCarrera)
        .then(respuesta => {
            this.datosInstituto = respuesta;
            this.logo = 'assets/images/logos/' + this.datosInstituto.nombre + '.png';
        })
        .catch(error => {

        });
    }

    getIngresos(): void {
        this.busy = this.ingresosDataService
            .getFiltrado(
                'id',
                'coincide',
                this.personaLogeada.idIngresos.toString()
            )
            .then(respuesta => {
                this.ingresos = respuesta[0].descripcion;
            })
            .catch(error => {});
    }
    getDatosCupo(idPersona: number): void {
        this.busy = this.matriculacionDataService.getDatosCupo(idPersona)
        .then(respuesta => {
            this.datosCupo = respuesta;
            this.getDatosInstituto(this.datosCupo.idCarrera);
            this.getCarrera(this.datosCupo.idCarrera);
            const meses = ['ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGO', 'SEP', 'OCT', 'NOV', 'DIC'];
            this.barcode = this.fechaActual.getFullYear().toString() + '-' + meses[this.fechaActual.getMonth()] + '-' + this.datosCupo.siglasCarrera + '-' + this.datosCupo.identificacion;
        })
        .catch(error => {

        });
    }

    getCarrera(idCarrera: number): void {
        this.busy = this.carreraDataService.get(idCarrera)
        .then(respuesta => {
            if ( JSON.stringify(respuesta) == 'false' ) {
                return;
            }
            this.carrera = respuesta;
        })
        .catch(error => {

        });
    }
    imprimir(): void {
        html2canvas(this.encabezadoFormularioIngles.nativeElement).then(canvasEncabezado => {
            const encabezadoImg = canvasEncabezado.toDataURL('image/png');
            html2canvas(this.cuerpoFormularioInglesPG1.nativeElement).then(canvasCuerpoPG1 => {
                const PG1Img = canvasCuerpoPG1.toDataURL('image/png');
                html2canvas(this.cuerpoFormularioInglesPG2.nativeElement).then(canvasCuerpoPG2 => {
                    const PG2Img = canvasCuerpoPG2.toDataURL('image/png');
                    html2canvas(this.pieFormularioInglesPG1.nativeElement).then(canvasPiePG1 => {
                        const piePG1Img = canvasPiePG1.toDataURL('image/png');
                        html2canvas(this.pieFormularioInglesPG2.nativeElement).then(canvasPiePG2 => {
                            const piePG2Img = canvasPiePG2.toDataURL('image/png');
                            const doc = new jsPDF();
                            doc.addImage(encabezadoImg, 'PNG', 20, 10, 190, 30);
                            doc.addImage(PG1Img, 'PNG', 20, 40, 190, 217);
                            doc.addImage(piePG1Img, 'PNG', 20, 267, 190, 20);
                            doc.addPage();
                            doc.addImage(encabezadoImg, 'PNG', 20, 10, 190, 30);
                            doc.addImage(PG2Img, 'PNG', 20, 40, 190, 217);
                            doc.addImage(piePG2Img, 'PNG', 20, 257, 190, 30);
                            doc.save('FormularioIngles_' + this.personaLogeada.identificacion + '.pdf');
                        });
                    });
                });
            });
        });
    }
}
