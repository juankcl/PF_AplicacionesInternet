export class User {
	id: number;
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

export class Message {
	message: string;
	type: string;
}
