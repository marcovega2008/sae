import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

import { EmpresaCapacitacionContinuaRoutingModule } from './empresacapacitacioncontinua-routing.module';
import { EmpresaCapacitacionContinuaComponent } from './empresacapacitacioncontinua.component';
import { EmpresaCapacitacionContinuaService } from './empresacapacitacioncontinua.service';

@NgModule({
   imports: [
      CommonModule,
      FormsModule,
      EmpresaCapacitacionContinuaRoutingModule
   ],
   providers: [EmpresaCapacitacionContinuaService],
   declarations: [EmpresaCapacitacionContinuaComponent],
})
export class EmpresaCapacitacionContinuaModule { }
