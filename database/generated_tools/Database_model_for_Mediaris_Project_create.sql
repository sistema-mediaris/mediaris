-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2016-11-11 09:12:34.981

-- tables
-- Table: aluno_turma
CREATE TABLE aluno_turma (
    alunos_id int NOT NULL,
    turmas_id int NOT NULL,
    CONSTRAINT aluno_turma_pk PRIMARY KEY (alunos_id,turmas_id)
);

-- Table: alunos
CREATE TABLE alunos (
    id int NOT NULL,
    usuarios_id int NOT NULL,
    nome_exibicao varchar(100) NOT NULL,
    CONSTRAINT id PRIMARY KEY (id)
);

-- Table: cidade_instituicao
CREATE TABLE cidade_instituicao (
    instituicoes_id int NOT NULL,
    cidades_id int NOT NULL,
    CONSTRAINT cidade_instituicao_pk PRIMARY KEY (instituicoes_id,cidades_id)
);

-- Table: cidades
CREATE TABLE cidades (
    id int NOT NULL,
    estados_id int NOT NULL,
    nome varchar(150) NOT NULL,
    CONSTRAINT cidades_pk PRIMARY KEY (id)
);

-- Table: complementos
CREATE TABLE complementos (
    id int NOT NULL,
    descricao text NOT NULL,
    assunto text NOT NULL,
    objetivo text NOT NULL,
    CONSTRAINT complementos_pk PRIMARY KEY (id)
);

-- Table: curso_disciplina
CREATE TABLE curso_disciplina (
    cursos_id int NOT NULL,
    disciplinas_id int NOT NULL,
    CONSTRAINT curso_disciplina_pk PRIMARY KEY (cursos_id,disciplinas_id)
);

-- Table: curso_grau_academico
CREATE TABLE curso_grau_academico (
    cursos_id int NOT NULL,
    graus_academicos_id int NOT NULL,
    CONSTRAINT curso_grau_academico_pk PRIMARY KEY (cursos_id,graus_academicos_id)
);

-- Table: curso_instituicao
CREATE TABLE curso_instituicao (
    instituicoes_id int NOT NULL,
    cursos_id int NOT NULL,
    CONSTRAINT curso_instituicao_pk PRIMARY KEY (instituicoes_id,cursos_id)
);

-- Table: curso_turno
CREATE TABLE curso_turno (
    cursos_id int NOT NULL,
    turnos_id int NOT NULL,
    CONSTRAINT curso_turno_pk PRIMARY KEY (cursos_id,turnos_id)
);

-- Table: cursos
CREATE TABLE cursos (
    id int NOT NULL,
    nome varchar(150) NOT NULL,
    duracao_sem int NOT NULL,
    duracao_ano int NOT NULL,
    CONSTRAINT cursos_pk PRIMARY KEY (id)
);

-- Table: disciplinas
CREATE TABLE disciplinas (
    id int NOT NULL,
    nome varchar(50) NOT NULL,
    CONSTRAINT disciplinas_pk PRIMARY KEY (id)
);

-- Table: docentes
CREATE TABLE docentes (
    id int NOT NULL,
    usuarios_id int NOT NULL,
    titulacoes_id int,
    nome_exibicao varchar(100) NOT NULL,
    CONSTRAINT id PRIMARY KEY (id)
);

-- Table: entrega_trabalho
CREATE TABLE entrega_trabalho (
    entregas_id int NOT NULL,
    trabalhos_id int NOT NULL,
    CONSTRAINT entrega_trabalho_pk PRIMARY KEY (entregas_id,trabalhos_id)
);

-- Table: entregas
CREATE TABLE entregas (
    id int NOT NULL,
    alunos_id int NOT NULL,
    solicitacoes_id int NOT NULL,
    feedback_id int NOT NULL,
    CONSTRAINT entregas_pk PRIMARY KEY (id)
);

-- Table: estados
CREATE TABLE estados (
    id int NOT NULL,
    nome varchar(100) NOT NULL,
    sigla varchar(2) NOT NULL,
    CONSTRAINT estados_pk PRIMARY KEY (id)
);

-- Table: feedback
CREATE TABLE feedback (
    id int NOT NULL,
    comentario text NOT NULL,
    CONSTRAINT feedback_pk PRIMARY KEY (id)
);

-- Table: graus_academicos
CREATE TABLE graus_academicos (
    id int NOT NULL,
    nome varchar(100) NOT NULL,
    CONSTRAINT graus_academicos_pk PRIMARY KEY (id)
);

-- Table: instituicoes
CREATE TABLE instituicoes (
    id int NOT NULL,
    nome varchar(255) NOT NULL,
    sigla varchar(10) NOT NULL,
    CONSTRAINT instituicoes_pk PRIMARY KEY (id)
);

-- Table: solicitacao_tipo_arquivo
CREATE TABLE solicitacao_tipo_arquivo (
    solicitacoes_id int NOT NULL,
    tipos_arquivos_id int NOT NULL,
    CONSTRAINT solicitacao_tipo_arquivo_pk PRIMARY KEY (solicitacoes_id,tipos_arquivos_id)
);

-- Table: solicitacoes
CREATE TABLE solicitacoes (
    id int NOT NULL,
    turmas_id int NOT NULL,
    complementos_id int NOT NULL,
    nome varchar(255) NOT NULL,
    data_criacao date NOT NULL,
    data_entrega date NOT NULL,
    CONSTRAINT solicitacoes_pk PRIMARY KEY (id)
);

-- Table: tipos_arquivos
CREATE TABLE tipos_arquivos (
    id int NOT NULL,
    extensao varchar(10) NOT NULL,
    CONSTRAINT tipos_arquivos_pk PRIMARY KEY (id)
);

-- Table: titulacoes
CREATE TABLE titulacoes (
    id int NOT NULL,
    nome varchar(100) NOT NULL,
    abreviacao varchar(20) NOT NULL,
    CONSTRAINT titulacoes_pk PRIMARY KEY (id)
);

-- Table: trabalhos
CREATE TABLE trabalhos (
    id int NOT NULL,
    nome varchar(255) NOT NULL,
    extensao varchar(10) NOT NULL,
    tipo varchar(50) NOT NULL,
    url_cloud varchar(255) NOT NULL,
    CONSTRAINT trabalhos_pk PRIMARY KEY (id)
);

-- Table: turmas
CREATE TABLE turmas (
    id int NOT NULL,
    docentes_id int NOT NULL,
    instituicoes_id int NOT NULL,
    semestre int NOT NULL,
    ano int NOT NULL,
    url varchar(255) NOT NULL,
    CONSTRAINT turmas_pk PRIMARY KEY (id)
);

-- Table: turnos
CREATE TABLE turnos (
    id int NOT NULL,
    periodo varchar(20) NOT NULL,
    CONSTRAINT turnos_pk PRIMARY KEY (id)
);

-- Table: usuarios
CREATE TABLE usuarios (
    id int NOT NULL,
    name varchar(100) NOT NULL,
    email varchar(100) NOT NULL,
    avatar varchar(255) NOT NULL,
    provider varchar(32) NOT NULL,
    social_id text NOT NULL,
    CONSTRAINT id PRIMARY KEY (id)
);

-- foreign keys
-- Reference: aluno_turma_alunos (table: aluno_turma)
ALTER TABLE aluno_turma ADD CONSTRAINT aluno_turma_alunos FOREIGN KEY aluno_turma_alunos (alunos_id)
    REFERENCES alunos (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE;

-- Reference: aluno_turma_turmas (table: aluno_turma)
ALTER TABLE aluno_turma ADD CONSTRAINT aluno_turma_turmas FOREIGN KEY aluno_turma_turmas (turmas_id)
    REFERENCES turmas (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE;

-- Reference: alunos_usuarios (table: alunos)
ALTER TABLE alunos ADD CONSTRAINT alunos_usuarios FOREIGN KEY alunos_usuarios (usuarios_id)
    REFERENCES usuarios (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE;

-- Reference: cidades_estados (table: cidades)
ALTER TABLE cidades ADD CONSTRAINT cidades_estados FOREIGN KEY cidades_estados (estados_id)
    REFERENCES estados (id);

-- Reference: curso_disciplina_cursos (table: curso_disciplina)
ALTER TABLE curso_disciplina ADD CONSTRAINT curso_disciplina_cursos FOREIGN KEY curso_disciplina_cursos (cursos_id)
    REFERENCES cursos (id);

-- Reference: curso_disciplina_disciplinas (table: curso_disciplina)
ALTER TABLE curso_disciplina ADD CONSTRAINT curso_disciplina_disciplinas FOREIGN KEY curso_disciplina_disciplinas (disciplinas_id)
    REFERENCES disciplinas (id);

-- Reference: curso_grau_academico_cursos (table: curso_grau_academico)
ALTER TABLE curso_grau_academico ADD CONSTRAINT curso_grau_academico_cursos FOREIGN KEY curso_grau_academico_cursos (cursos_id)
    REFERENCES cursos (id);

-- Reference: curso_grau_academico_graus_academicos (table: curso_grau_academico)
ALTER TABLE curso_grau_academico ADD CONSTRAINT curso_grau_academico_graus_academicos FOREIGN KEY curso_grau_academico_graus_academicos (graus_academicos_id)
    REFERENCES graus_academicos (id);

-- Reference: curso_turno_cursos (table: curso_turno)
ALTER TABLE curso_turno ADD CONSTRAINT curso_turno_cursos FOREIGN KEY curso_turno_cursos (cursos_id)
    REFERENCES cursos (id);

-- Reference: curso_turno_turnos (table: curso_turno)
ALTER TABLE curso_turno ADD CONSTRAINT curso_turno_turnos FOREIGN KEY curso_turno_turnos (turnos_id)
    REFERENCES turnos (id);

-- Reference: docentes_titulacoes (table: docentes)
ALTER TABLE docentes ADD CONSTRAINT docentes_titulacoes FOREIGN KEY docentes_titulacoes (titulacoes_id)
    REFERENCES titulacoes (id)
    ON DELETE SET NULL
    ON UPDATE CASCADE;

-- Reference: docentes_usuarios (table: docentes)
ALTER TABLE docentes ADD CONSTRAINT docentes_usuarios FOREIGN KEY docentes_usuarios (usuarios_id)
    REFERENCES usuarios (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE;

-- Reference: entrega_trabalho_entregas (table: entrega_trabalho)
ALTER TABLE entrega_trabalho ADD CONSTRAINT entrega_trabalho_entregas FOREIGN KEY entrega_trabalho_entregas (entregas_id)
    REFERENCES entregas (id);

-- Reference: entrega_trabalho_trabalhos (table: entrega_trabalho)
ALTER TABLE entrega_trabalho ADD CONSTRAINT entrega_trabalho_trabalhos FOREIGN KEY entrega_trabalho_trabalhos (trabalhos_id)
    REFERENCES trabalhos (id);

-- Reference: entregas_alunos (table: entregas)
ALTER TABLE entregas ADD CONSTRAINT entregas_alunos FOREIGN KEY entregas_alunos (alunos_id)
    REFERENCES alunos (id);

-- Reference: entregas_feedback (table: entregas)
ALTER TABLE entregas ADD CONSTRAINT entregas_feedback FOREIGN KEY entregas_feedback (feedback_id)
    REFERENCES feedback (id);

-- Reference: entregas_solicitacoes (table: entregas)
ALTER TABLE entregas ADD CONSTRAINT entregas_solicitacoes FOREIGN KEY entregas_solicitacoes (solicitacoes_id)
    REFERENCES solicitacoes (id);

-- Reference: instituicao_cidade_cidades (table: cidade_instituicao)
ALTER TABLE cidade_instituicao ADD CONSTRAINT instituicao_cidade_cidades FOREIGN KEY instituicao_cidade_cidades (cidades_id)
    REFERENCES cidades (id);

-- Reference: instituicao_cidade_instituicoes (table: cidade_instituicao)
ALTER TABLE cidade_instituicao ADD CONSTRAINT instituicao_cidade_instituicoes FOREIGN KEY instituicao_cidade_instituicoes (instituicoes_id)
    REFERENCES instituicoes (id);

-- Reference: instituicao_curso_cursos (table: curso_instituicao)
ALTER TABLE curso_instituicao ADD CONSTRAINT instituicao_curso_cursos FOREIGN KEY instituicao_curso_cursos (cursos_id)
    REFERENCES cursos (id);

-- Reference: instituicao_curso_instituicoes (table: curso_instituicao)
ALTER TABLE curso_instituicao ADD CONSTRAINT instituicao_curso_instituicoes FOREIGN KEY instituicao_curso_instituicoes (instituicoes_id)
    REFERENCES instituicoes (id);

-- Reference: solicitacoes_complementos (table: solicitacoes)
ALTER TABLE solicitacoes ADD CONSTRAINT solicitacoes_complementos FOREIGN KEY solicitacoes_complementos (complementos_id)
    REFERENCES complementos (id);

-- Reference: tipo_arquivo_trabalho_tipos_arquivos (table: solicitacao_tipo_arquivo)
ALTER TABLE solicitacao_tipo_arquivo ADD CONSTRAINT tipo_arquivo_trabalho_tipos_arquivos FOREIGN KEY tipo_arquivo_trabalho_tipos_arquivos (tipos_arquivos_id)
    REFERENCES tipos_arquivos (id);

-- Reference: tipo_arquivo_trabalho_trabalhos (table: solicitacao_tipo_arquivo)
ALTER TABLE solicitacao_tipo_arquivo ADD CONSTRAINT tipo_arquivo_trabalho_trabalhos FOREIGN KEY tipo_arquivo_trabalho_trabalhos (solicitacoes_id)
    REFERENCES solicitacoes (id);

-- Reference: trabalhos_turmas (table: solicitacoes)
ALTER TABLE solicitacoes ADD CONSTRAINT trabalhos_turmas FOREIGN KEY trabalhos_turmas (turmas_id)
    REFERENCES turmas (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE;

-- Reference: turmas_docentes (table: turmas)
ALTER TABLE turmas ADD CONSTRAINT turmas_docentes FOREIGN KEY turmas_docentes (docentes_id)
    REFERENCES docentes (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE;

-- Reference: turmas_instituicoes (table: turmas)
ALTER TABLE turmas ADD CONSTRAINT turmas_instituicoes FOREIGN KEY turmas_instituicoes (instituicoes_id)
    REFERENCES instituicoes (id);

-- End of file.

