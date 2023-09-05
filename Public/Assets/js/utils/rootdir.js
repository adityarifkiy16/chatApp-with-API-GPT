export default class RootDirectory {
  constructor() {
    this.rootDir = window.location.origin + "/ChatAI/Public";
  }

  getRootDirectory() {
    return this.rootDir;
  }
}
