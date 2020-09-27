export class Todo {
  id: number;
  text: string;
  pass: string;

  constructor(id: number, text: string, pass: string) {
    this.id = id;
    this.text = text;
    this.pass = pass;
  }
}
