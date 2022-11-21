CREATE TABLE `categorie`(
    `id` int not null primary key auto_increment,
    `code_cat` varchar(20) not null,
    `libelle` varchar(100) not null,
    `userCreated` int not null,
    `etat` tinyint(2) null,
    `created_at` datetime null,
    `updated_at` datetime null,
    constraint foreign key (`userCreated`) references `utilisateur`(`id`)
);

CREATE TABLE `revenu`(
    `id` int not null primary key auto_increment,
    `libelle` varchar(100) not null,
    `montant` float(8,2) not null,
    `budget_id` int not null,
    `user_id` int not null,
    `etat` tinyint(2) null,
    `created_at` datetime null,
    `updated_at` datetime null,
    constraint foreign key (`budget_id`) references `budgets`(`id`),
    constraint foreign key (`user_id`) references `utilisateur`(`id`)
);

CREATE TABLE `budgets`(
    `id` int not null primary key auto_increment,
    `libelle` varchar(100) not null,
    `dateDeb` date null,
    `dateFin` date null,
    `user_id` int not null,
    `etat` tinyint(2) null,
    `created_at` datetime null,
    `updated_at` datetime null,
    constraint foreign key (`user_id`) references `utilisateur`(`id`)
);

CREATE TABLE `depenses`(
    `id` int not null primary key auto_increment,
    `libelle` varchar(100) not null,
    `montant` bigint null,
    `budget_id` int not null,
    `categorie_id` int not null,
    `user_id` int not null,
    `etat` tinyint(2) null,
    `created_at` datetime null,
    `updated_at` datetime null,
    constraint foreign key (`categorie_id`) references `categorie`(`id`),
    constraint foreign key (`budget_id`) references `budget`(`id`),
    constraint foreign key (`user_id`) references `utilisateur`(`id`)
);

