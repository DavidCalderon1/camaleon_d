

CREATE TABLE cuenta_clase(
	nombre VARCHAR(255) NOT NULL,
	descripcion TEXT,
	ajuste VARCHAR(10) NOT NULL,
	naturaleza VARCHAR(10),
	codigo VARCHAR(1) PRIMARY KEY,
	created_at timestamp(0) without time zone,
	updated_at timestamp(0) without time zone,
	deleted_at timestamp(0) without time zone
);

CREATE TABLE cuenta_grupo(
	nombre VARCHAR(255) NOT NULL,
	descripcion TEXT,
	ajuste VARCHAR(10) NOT NULL,
	clase_id VARCHAR(1) REFERENCES cuenta_clase (codigo),
	codigo VARCHAR(2) PRIMARY KEY,
	created_at timestamp(0) without time zone,
	updated_at timestamp(0) without time zone,
	deleted_at timestamp(0) without time zone
);

CREATE TABLE cuenta(
	nombre VARCHAR(255) NOT NULL,
	descripcion TEXT,
	ajuste VARCHAR(10) NOT NULL,
	grupo_id VARCHAR(2) REFERENCES cuenta_grupo (codigo),
	codigo VARCHAR(4) PRIMARY KEY,
	created_at timestamp(0) without time zone,
	updated_at timestamp(0) without time zone,
	deleted_at timestamp(0) without time zone
);

CREATE TABLE subcuenta(
	nombre VARCHAR(255) NOT NULL,
	descripcion TEXT,
	ajuste VARCHAR(10) NOT NULL,
	nativa BOOLEAN,
	cuenta_id VARCHAR(4) REFERENCES cuenta (codigo),
	codigo VARCHAR(6) PRIMARY KEY,
	created_at timestamp(0) without time zone,
	updated_at timestamp(0) without time zone,
	deleted_at timestamp(0) without time zone
);

CREATE TABLE cuenta_auxiliar(
	nombre VARCHAR(255) NOT NULL,
	descripcion TEXT,
	ajuste VARCHAR(10) NOT NULL,
	tercero_activo BOOLEAN,
	estado BOOLEAN,
	subcuenta_id VARCHAR(6) REFERENCES subcuenta (codigo),
	codigo VARCHAR(16) PRIMARY KEY,
	created_at timestamp(0) without time zone,
	updated_at timestamp(0) without time zone,
	deleted_at timestamp(0) without time zone
);