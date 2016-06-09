/* CUENTAS PUC */

CREATE TABLE cuenta_clase(
	nombre VARCHAR(255) NOT NULL,
	descripcion TEXT,
	ajuste VARCHAR(10) NOT NULL,
	cntc_naturaleza VARCHAR(10),
	cntc_id VARCHAR(1) PRIMARY KEY,
	created_at timestamp(0) without time zone,
	updated_at timestamp(0) without time zone,
	deleted_at timestamp(0) without time zone
);

CREATE TABLE cuenta_grupo(
	nombre VARCHAR(255) NOT NULL,
	descripcion TEXT,
	ajuste VARCHAR(10) NOT NULL,
	cntg_cntcid VARCHAR(1) REFERENCES cuenta_clase (cntc_id),
	cntg_id VARCHAR(2) PRIMARY KEY,
	created_at timestamp(0) without time zone,
	updated_at timestamp(0) without time zone,
	deleted_at timestamp(0) without time zone
);

CREATE TABLE cuenta(
	nombre VARCHAR(255) NOT NULL,
	descripcion TEXT,
	ajuste VARCHAR(10) NOT NULL,
	cnt_cntgid VARCHAR(2) REFERENCES cuenta_grupo (cntg_id),
	cnt_id VARCHAR(4) PRIMARY KEY,
	created_at timestamp(0) without time zone,
	updated_at timestamp(0) without time zone,
	deleted_at timestamp(0) without time zone
);

CREATE TABLE subcuenta(
	nombre VARCHAR(255) NOT NULL,
	descripcion TEXT,
	ajuste VARCHAR(10) NOT NULL,
	scnt_nativa BOOLEAN,
	scnt_cntid VARCHAR(4) REFERENCES cuenta (cnt_id),
	scnt_id VARCHAR(6) PRIMARY KEY,
	created_at timestamp(0) without time zone,
	updated_at timestamp(0) without time zone,
	deleted_at timestamp(0) without time zone
);

CREATE TABLE cuenta_auxiliar(
	nombre VARCHAR(255) NOT NULL,
	descripcion TEXT,
	ajuste VARCHAR(10) NOT NULL,
	reqta BOOLEAN,
	estado BOOLEAN,
	cntaux_scntid VARCHAR(6) REFERENCES subcuenta (scnt_id),
	cntaux_id VARCHAR(16) PRIMARY KEY,
	created_at timestamp(0) without time zone,
	updated_at timestamp(0) without time zone,
	deleted_at timestamp(0) without time zone
);