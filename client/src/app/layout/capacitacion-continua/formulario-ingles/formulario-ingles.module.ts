import { CupoService } from './../../../CRUD/cupo/cupo.service';
import { EstudianteService } from 'app/CRUD/estudiante/estudiante.service';
import { EtniaService } from 'app/CRUD/etnia/etnia.service';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { NgxBarcodeModule } from 'ngx-barcode';
import { MatriculacionService } from 'app/layout/matriculacion/matriculacion.service';
import { FormularioInglesRoutingModule } from './formulario-ingles-routing.module';
import { FormularioInglesComponent } from './formulario-ingles.component';
import { TipoSangreService } from '../../../CRUD/tiposangre/tiposangre.service';
import { UbicacionService } from '../../../CRUD/ubicacion/ubicacion.service';
import { CarreraService } from 'app/CRUD/carrera/carrera.service';
import { TipoIngresosService } from 'app/CRUD/tipoingresos/tipoingresos.service';
import { PeriodoLectivoService } from '../../../CRUD/periodolectivo/periodolectivo.service';
import { NivelCapacitacionContinuaService } from './../nivelcapacitacioncontinua/nivelcapacitacioncontinua.service';

@NgModule({
  imports: [
    CommonModule,
    NgxBarcodeModule,
    FormularioInglesRoutingModule
  ],
  declarations: [FormularioInglesComponent],
  providers: [MatriculacionService,
              TipoSangreService,
              NivelCapacitacionContinuaService,
              UbicacionService,
              PeriodoLectivoService,
              CarreraService,
              TipoIngresosService,
              CupoService,
              EstudianteService,
              EtniaService]
})
export class FormularioInglesModule { }
