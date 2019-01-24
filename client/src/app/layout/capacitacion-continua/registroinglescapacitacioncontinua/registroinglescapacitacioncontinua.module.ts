import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

import { RegistroInglesCapacitacionContinuaRoutingModule } from './registroinglescapacitacioncontinua-routing.module';
import { RegistroInglesCapacitacionContinuaComponent } from './registroinglescapacitacioncontinua.component';
import { RegistroInglesCapacitacionContinuaService } from './registroinglescapacitacioncontinua.service';

@NgModule({
   imports: [
      CommonModule,
      FormsModule,
      RegistroInglesCapacitacionContinuaRoutingModule
   ],
   providers: [RegistroInglesCapacitacionContinuaService],
   declarations: [RegistroInglesCapacitacionContinuaComponent],
})
export class RegistroInglesCapacitacionContinuaModule { }
