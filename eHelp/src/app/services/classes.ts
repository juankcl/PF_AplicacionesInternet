export class User {
	userId: number;
	nombre: string;
	username: string;
	email: string;
	password: string;
}

export class Session {
	valid: boolean;
	user: User;
	admin: boolean;
}
