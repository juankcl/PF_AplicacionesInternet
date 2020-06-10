export class User {
	userId: number;
	username: string;
	email: string;
	password: string;
}

export class Session {
	valid: boolean;
	user: User;
	admin: boolean;
}
