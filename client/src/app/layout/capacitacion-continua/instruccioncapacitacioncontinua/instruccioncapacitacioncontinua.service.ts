import {Injectable} from '@angular/core';
import {Headers, Http} from '@angular/http';
import {environment} from '../../../../environments/environment';

import 'rxjs/add/operator/toPromise';

import {InstruccionCapacitacionContinua} from '../../../entidades/CRUD/InstruccionCapacitacionContinua';

@Injectable()

export class InstruccionCapacitacionContinuaService {
    private headers = new Headers({'Content-Type': 'application/json', 'Access-Control-Allow-Origin': '*'});
    private urlBase = environment.apiUrl + 'instruccioncapacitacioncontinua';

    constructor(private http: Http) {
    }

    baseUrl(): string {
        return this.urlBase;
    }

    getAll(): Promise<InstruccionCapacitacionContinua[]> {
     return this.http.get(this.urlBase + '/leer').toPromise().then(response => response.json() as InstruccionCapacitacionContinua[]).catch(this.handleError);
    }

    getCarrerasVigentes(): Promise<InstruccionCapacitacionContinua[]> {
        return this.http.get(this.urlBase + '/leer_vigentes').toPromise().then(response => response.json() as InstruccionCapacitacionContinua[]).catch(this.handleError);
    }
    getPagina(pagina: number, tamanoPagina: number): Promise<InstruccionCapacitacionContinua[]> {
        return this.http.get(this.urlBase + '/leer_paginado' + '?pagina=' + pagina + '&registros_por_pagina=' + tamanoPagina).toPromise().then(response => response.json() as InstruccionCapacitacionContinua[]).catch(this.handleError);
    }

    getFiltrado(columna: string, tipoFiltro: string, filtro: string): Promise<InstruccionCapacitacionContinua[]> {
        return this.http.get(this.urlBase + '/leer_filtrado' + '?columna=' + columna + '&tipo_filtro=' + tipoFiltro + '&filtro=' + filtro).toPromise().then(response => response.json() as InstruccionCapacitacionContinua[]).catch(this.handleError);
    }

    getNumeroPaginas(tamanoPagina: number): Promise<any> {
        return this.http.get(this.urlBase + '/numero_paginas' + '?registros_por_pagina=' + tamanoPagina).toPromise().then(response => response.json()).catch(this.handleError);
    }

    get(id: number): Promise<InstruccionCapacitacionContinua> {
        const url = `${this.urlBase + '/leer'}?id=${id}`;
        return this.http.get(url).toPromise().then(response => (response.json() as InstruccionCapacitacionContinua[])[0]).catch(this.handleError);
    }

    remove(id: number): Promise<boolean> {
        const url = `${this.urlBase + '/borrar'}?id=${id}`;
        return this.http.get(url).toPromise().then(response => response.json() as InstruccionCapacitacionContinua).catch(this.handleError);
    }

    create(entidadTransporte: InstruccionCapacitacionContinua): Promise<boolean> {
        const url = `${this.urlBase + '/crear'}`;
        return this.http.post(url, JSON.stringify(entidadTransporte)).toPromise().then(response => response.json()).catch(this.handleError);
    }

    update(entidadTransporte: InstruccionCapacitacionContinua): Promise<boolean> {
        const url = `${this.urlBase + '/actualizar'}`;
        return this.http.post(url, JSON.stringify(entidadTransporte)).toPromise().then(response => response.json()).catch(this.handleError);
    }

    handleError(error: any): Promise<any> {
        console.error('An error occurred', error); // for demo purposes only
        return Promise.reject(error.message || error);
    }
}
